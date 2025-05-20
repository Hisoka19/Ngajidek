import Swal from "sweetalert2";
import { DateTime } from "luxon";

window.showJoinSuccess = function () {
    Swal.fire({
        title: "Berhasil!",
        text: "Kamu akan diarahkan ke Zoom!",
        icon: "success",
        timer: 1500,
        showConfirmButton: false,
    });
};

// Jalankan countdown untuk elemen dengan class .countdown
document.addEventListener("DOMContentLoaded", () => {
    const countdownElements = document.querySelectorAll("[data-start-time]");

    countdownElements.forEach((el) => {
        const startTime = el.getAttribute("data-start-time");

        const updateCountdown = () => {
            const now = DateTime.now().setZone("Asia/Jakarta");
            const target = DateTime.fromISO(startTime).setZone("Asia/Jakarta");
            const diff = target.diff(now, ["hours", "minutes", "seconds"]);

            if (diff.toMillis() <= 0) {
                el.textContent = "Sedang berlangsung atau telah selesai";
                return;
            }

            el.textContent = `Mulai dalam: ${diff.toFormat(
                "hh 'jam' mm 'menit' ss 'detik'"
            )}`;
            requestAnimationFrame(updateCountdown);
        };

        updateCountdown();
    });
});
