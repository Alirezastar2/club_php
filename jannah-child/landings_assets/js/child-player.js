(function () {
  "use strict";

  function formatTime(sec) {
    if (!isFinite(sec)) return "00:00";
    var m = Math.floor(sec / 60);
    var s = Math.floor(sec % 60);
    return (m < 10 ? "0" + m : m) + ":" + (s < 10 ? "0" + s : s);
  }

  function initPlayer(card) {
    console.log("Initializing player for card:", card);
    var audio = card.querySelector("audio");
    var playBtn = card.querySelector(".player-btn.play");
    var playImg = playBtn ? playBtn.querySelector("img") : null;
    var favBtn = card.querySelector(".player-btn.fav");
    var favIcon = favBtn ? favBtn.querySelector("img") : null;
    var cur =
      card.querySelector("#curTime") ||
      card.querySelector("#curTime2") ||
      card.querySelector(".player-times span:first-child");
    var dur =
      card.querySelector("#durTime") ||
      card.querySelector("#durTime2") ||
      card.querySelector(".player-times span:last-child");
    var bar = card.querySelector(".bar");
    var progress = card.querySelector(".player-progress");
    var dl = card.querySelector(".player-btn.download");

    console.log("Elements found:", {
      audio: !!audio,
      playBtn: !!playBtn,
      progress: !!progress,
      bar: !!bar,
      cur: !!cur,
      dur: !!dur,
    });

    if (!audio || !playBtn || !progress || !bar) {
      console.log("Player init failed - missing elements");
      return; // کارت ناقص
    }

    // تنظیمات اولیه و تشخیص دستگاه
    var isMobile = window.innerWidth <= 768;
    var isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent);
    var isAndroid = /Android/.test(navigator.userAgent);
    var isWebView =
      /wv|WebView/.test(navigator.userAgent) ||
      typeof window.ReactNativeWebView !== "undefined";
    // اطمینان از playsinline روی همه دستگاه‌ها
    audio.setAttribute("playsinline", "true");
    audio.setAttribute("webkit-playsinline", "true");
    audio.playsInline = true;
    audio.webkitPlaysInline = true;
    // حذف crossOrigin که ممکن است در برخی موبایل‌ها مشکل‌ساز شود
    try {
      audio.removeAttribute("crossorigin");
      audio.crossOrigin = null;
    } catch (_) {}
    // preload سبک برای موبایل
    if (isMobile) audio.setAttribute("preload", "metadata");

    // اگر در WebView هستیم، کنترل بومی را از ابتدا نمایش بده تا پخش تضمین شود
    if (isWebView) {
      audio.setAttribute("controls", "controls");
      audio.style.display = "block";
      audio.style.width = "100%";
      audio.style.marginTop = "10px";
    }

    function syncDownloadHref() {
      if (!dl) return;
      var url = audio.currentSrc || audio.src || "";
      if (url) {
        dl.dataset.href = url;
        try {
          var name =
            new URL(url, window.location.href).pathname.split("/").pop() ||
            "audio.mp3";
        } catch (e) {
          var name = "audio.mp3";
        }
        dl.dataset.filename = name;
        dl.removeAttribute("aria-disabled");
      } else {
        delete dl.dataset.href;
        delete dl.dataset.filename;
        dl.setAttribute("aria-disabled", "true");
      }
    }

    audio.addEventListener("loadedmetadata", function () {
      if (dur) dur.textContent = formatTime(audio.duration);
      bar.style.width = "0%";
      syncDownloadHref();
    });
    audio.addEventListener("canplay", syncDownloadHref);
    audio.addEventListener("timeupdate", function () {
      if (cur) cur.textContent = formatTime(audio.currentTime);
      if (audio.duration && isFinite(audio.duration)) {
        var pct = Math.max(
          0,
          Math.min(100, (audio.currentTime / audio.duration) * 100)
        );
        bar.style.width = pct + "%";
      }
    });

    function setPlayUI(isPlaying) {
      if (!playImg) return;
      var src = playImg.getAttribute("src") || "";
      var lastSlash = src.lastIndexOf("/");
      var dir =
        lastSlash > -1
          ? src.slice(0, lastSlash + 1)
          : "https://club.snapp.ir/wp-content/uploads/2025/10/";
      playBtn.setAttribute("aria-pressed", isPlaying ? "true" : "false");
      playImg.src = dir + (isPlaying ? "pause-Circle.svg" : "play-Circle.svg");
    }

    audio.addEventListener("play", function () {
      setPlayUI(true);
    });
    audio.addEventListener("pause", function () {
      setPlayUI(false);
    });

    // منطق ساده پخش
    function handlePlay() {
      console.log("Play button clicked for audio:", audio.src);

      if (audio.paused) {
        // در موبایل، کنترل بومی را نمایش بده
        if (isMobile || isWebView) {
          audio.setAttribute("controls", "controls");
          audio.style.display = "block";
          audio.style.width = "100%";
          audio.style.marginTop = "10px";
          audio.style.background = "rgba(255,255,255,0.1)";
          audio.style.borderRadius = "8px";
          audio.style.padding = "8px";
          audio.style.border = "1px solid rgba(255,255,255,0.2)";
          return;
        }

        // در دسکتاپ، پخش عادی
        try {
          audio.play();
        } catch (ex) {
          console.warn("Audio play error:", ex);
        }
      } else {
        audio.pause();
      }
    }

    playBtn.addEventListener("click", function (e) {
      e.preventDefault();
      e.stopPropagation();
      e.stopImmediatePropagation();
      handlePlay();
    });

    // اطمینان از تریگر لمس در موبایل
    if (isMobile) {
      playBtn.addEventListener(
        "touchstart",
        function (e) {
          e.preventDefault();
          e.stopPropagation();
          e.stopImmediatePropagation();
          console.log("Touch start on play button");
          handlePlay();
        },
        { passive: false }
      );
    }

    if (progress) {
      progress.style.pointerEvents = "auto";

      function seekTo(clientX) {
        var rect = progress.getBoundingClientRect();
        var width = rect.width || progress.clientWidth || 0;
        var x = Math.max(0, Math.min(width, clientX - rect.left));
        var pct = width ? x / width : 0;
        if (audio.duration && isFinite(audio.duration)) {
          audio.currentTime = pct * audio.duration;
        }
      }
      progress.addEventListener("click", function (e) {
        seekTo(e.clientX);
      });
      var isDragging = false;
      progress.addEventListener("mousedown", function (e) {
        isDragging = true;
        seekTo(e.clientX);
      });
      window.addEventListener("mousemove", function (e) {
        if (isDragging) {
          seekTo(e.clientX);
        }
      });
      window.addEventListener("mouseup", function () {
        isDragging = false;
      });
      progress.addEventListener(
        "touchstart",
        function (e) {
          if (e.touches && e.touches[0]) seekTo(e.touches[0].clientX);
        },
        { passive: true }
      );
      progress.addEventListener(
        "touchmove",
        function (e) {
          if (e.touches && e.touches[0]) seekTo(e.touches[0].clientX);
        },
        { passive: true }
      );
    }

    // like toggle
    if (favBtn && favIcon) {
      favBtn.setAttribute("aria-pressed", "false");
      favBtn.addEventListener("click", function () {
        var pressed = favBtn.getAttribute("aria-pressed") === "true";
        var src = favIcon.getAttribute("src") || "";
        var lastSlash = src.lastIndexOf("/");
        var dir =
          lastSlash > -1
            ? src.slice(0, lastSlash + 1)
            : "https://club.snapp.ir/wp-content/uploads/2025/10/";
        favBtn.setAttribute("aria-pressed", pressed ? "false" : "true");
        favIcon.src = dir + (pressed ? "Like-none.svg" : "Like-selected.svg");
      });
    }

    // rAF updater برای روان‌تر کردن آپدیت نوار
    function rafUpdate() {
      if (bar && audio.duration && isFinite(audio.duration)) {
        var pct = Math.max(
          0,
          Math.min(100, (audio.currentTime / audio.duration) * 100)
        );
        bar.style.width = pct + "%";
      }
      requestAnimationFrame(rafUpdate);
    }
    requestAnimationFrame(rafUpdate);

    // download
    syncDownloadHref();
    if (dl) {
      dl.addEventListener("click", function (e) {
        e.preventDefault();
        var disabled = dl.getAttribute("aria-disabled") === "true";
        var href = dl.dataset.href;
        var filename = dl.dataset.filename || "audio.mp3";
        if (disabled || !href) {
          return false;
        }

        // تشخیص iOS/Safari برای مسیر ویژه دانلود
        var ua = navigator.userAgent || "";
        var isIOS =
          /iP(hone|od|ad)/.test(navigator.platform) ||
          (/Mac/.test(navigator.platform) && "ontouchend" in document);
        var isSafari = /^((?!chrome|android).)*safari/i.test(ua);

        var fallbackOpen = function () {
          // در صورت شکست، لینک را در تب جدید باز کن
          try {
            window.open(href, "_blank");
          } catch (_) {}
          return false;
        };

        var directDownload = function () {
          var a = document.createElement("a");
          a.href = href;
          a.setAttribute("download", filename);
          a.style.display = "none";
          document.body.appendChild(a);
          a.click();
          a.remove();
          return false;
        };

        var blobDownload = function () {
          return fetch(href, { mode: "cors", credentials: "omit" })
            .then(function (res) {
              return res.blob();
            })
            .then(function (blob) {
              var objectUrl = URL.createObjectURL(blob);
              var a = document.createElement("a");
              a.href = objectUrl;
              a.download = filename;
              a.style.display = "none";
              document.body.appendChild(a);
              a.click();
              setTimeout(function () {
                URL.revokeObjectURL(objectUrl);
                a.remove();
              }, 100);
              return false;
            });
        };

        // در iOS/Safari ابتدا تلاش با blob، در غیر اینصورت دانلود مستقیم
        if (isIOS || isSafari) {
          blobDownload().catch(function () {
            // اگر blob هم شکست خورد، fallback باز کردن لینک
            fallbackOpen();
          });
          return false;
        }

        // مرورگرهای دیگر معمولاً download attribute را پشتیبانی می‌کنند
        try {
          return directDownload();
        } catch (_) {
          // در صورت هر خطا، تلاش blob سپس fallback
          blobDownload().catch(function () {
            fallbackOpen();
          });
          return false;
        }
      });
    }
  }

  document.addEventListener("DOMContentLoaded", function () {
    // همه پلیرهای کارت‌ها (شامل مقدمه و قصه‌ها)
    var players = document.querySelectorAll(".player-card");
    console.log("Found player cards:", players.length);
    players.forEach(function (card, index) {
      console.log("Initializing player", index, card);
      initPlayer(card);
    });
  });
})();
