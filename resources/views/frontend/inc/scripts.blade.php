{{-- Bootstrap 5.3 Bundle (sudah termasuk Popper.js) --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

{{-- Library JS Lainnya (contoh: Swiper) --}}
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

{{-- Inisialisasi Skrip Kustom --}}
<script>
    // Fungsi untuk menginisialisasi Swiper
    function initSwiper() {
        new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    }

    // Fungsi untuk mengubah warna header saat scroll
    function handleHeaderScroll() {
        const navbar = document.querySelector(".navbar");
        if (window.scrollY > 50) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    }

    // Event listener untuk dieksekusi setelah DOM selesai dimuat
    document.addEventListener("DOMContentLoaded", function() {
        initSwiper();
        window.addEventListener("scroll", handleHeaderScroll);
    });
</script>
