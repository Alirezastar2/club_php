(function () {
  "use strict";

  function pad(n) {
    return n < 10 ? "0" + n : "" + n;
  }
  function fmt(seconds) {
    // نمایش یکنواخت به صورت HH:MM:SS
    seconds = Math.max(0, Math.floor(seconds));
    var h = Math.floor(seconds / 3600);
    var m = Math.floor((seconds % 3600) / 60);
    var s = seconds % 60;
    return pad(h) + ":" + pad(m) + ":" + pad(s);
  }

  function toFaDigits(input) {
    var map = ["۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹"];
    return String(input).replace(/[0-9]/g, function (d) {
      return map[d];
    });
  }

  function startCountdown(el) {
    // زمان هدف ثابت برای همه کاربران (مثلاً ساعت 18:00)
    var targetTime = el.getAttribute("data-target-time"); // فرمت: "18:00" یا timestamp
    var forceTomorrow = el.hasAttribute("data-tomorrow"); // اگر باشد، همیشه فردا را هدف بگیر
    var out = el.querySelector(".time") || el;

    if (!targetTime) {
      out.textContent = toFaDigits("00:00:00");
      return;
    }

    function updateCountdown() {
      var now = new Date();
      var target;

      // اگر targetTime یک timestamp است
      if (/^\d+$/.test(targetTime)) {
        target = new Date(parseInt(targetTime) * 1000);
      } else {
        // اگر فرمت "HH:MM" است
        var base = new Date();
        if (forceTomorrow) {
          // همیشه فردا ساعت هدف
          base.setDate(base.getDate() + 1);
        }
        var timeParts = targetTime.split(":");
        target = new Date(
          base.getFullYear(),
          base.getMonth(),
          base.getDate(),
          parseInt(timeParts[0]),
          parseInt(timeParts[1]),
          0
        );

        // اگر فردا اجباری نیست و زمان گذشته، فردا را در نظر بگیر
        if (!forceTomorrow && target <= now) {
          target.setDate(target.getDate() + 1);
        }
      }

      var diff = Math.floor((target - now) / 1000);

      if (diff <= 0) {
        out.textContent = toFaDigits("00:00:00");
        el.dispatchEvent(new CustomEvent("countdown:finished"));
        return;
      }

      out.textContent = toFaDigits(fmt(diff));
    }

    // اجرای اولیه
    updateCountdown();

    // به‌روزرسانی هر ثانیه
    var t = setInterval(updateCountdown, 1000);

    // ذخیره interval برای پاک کردن در صورت نیاز
    el._countdownInterval = t;
  }

  document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("[data-countdown]").forEach(function (el) {
      startCountdown(el);
    });
  });
})();
