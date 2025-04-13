let menu = document.querySelector('.menu-icon');
let navbar = document.querySelector('.menu');

menu.onclick = () =>{
    navbar.classList.toggle('active');
    menu.classList.toggle('move');
}

// notification
let bell = document.querySelector('.notification');

document.querySelector('#bell-icon').onclick = () =>{
    bell.classList.toggle('active');
}



// swiper
var swiper = new Swiper(".trending-content", {
    slidesPerView: 3,
    spaceBetween: 10,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      
    },
    // autoplay:{
    //     delay:5000,
    //     disableOnInteraction: true,
    // },
    breakpoints: {
      0:{
        slidesPerView: 3,
        spaceBetween: 9,
      },
      445: {
        slidesPerView: 3,
        spaceBetween: 9,
      },
      704: {
        slidesPerView: 4,
        spaceBetween: 10,
      },
      919: {
        slidesPerView: 4,
        spaceBetween: 12,
      },


      1081: {
        slidesPerView: 5,
        spaceBetween: 12,
      },
    },
  });

// Tombol slide popular games
  var swiper = new Swiper(".trending-content", {
    slidesPerView: 3,
    spaceBetween: 10,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    // autoplay: {
    //     delay: 5000,
    //     disableOnInteraction: true,
    // },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        0: {
            slidesPerView: 3,
            spaceBetween: 9,
        },
        445: {
            slidesPerView: 3,
            spaceBetween: 9,
        },
        704: {
          slidesPerView: 4,
          spaceBetween: 10,
        },
        919: {
          slidesPerView: 4,
          spaceBetween: 12,
        },
        1081: {
          slidesPerView: 5,
          spaceBetween: 12,
        },
    },
});



document.addEventListener('DOMContentLoaded', function () {
    // Menghapus kelas 'active' dari semua elemen h3 saat halaman pertama kali dimuat
    document.querySelectorAll('.detail-jumlah li').forEach(function (element) {
        element.classList.remove('active');
    });
    
    // Adding click event listener to each list item
    document.querySelectorAll('.detail-jumlah li').forEach(function (element) {
        element.addEventListener('click', function () {
            document.querySelectorAll('.detail-jumlah li').forEach(function (el) {
                el.classList.remove('active');
            });
            element.classList.add('active');
        });
    });
    
    // Menghapus kelas 'active' dari semua elemen wrap saat halaman pertama kali dimuat
    document.querySelectorAll('.wrap').forEach(function (element) {
        element.classList.remove('active');
    });
    
    // Adding click event listener to each payment method
    document.querySelectorAll('.wrap').forEach(function (element) {
        element.addEventListener('click', function () {
            document.querySelectorAll('.wrap').forEach(function (el) {
                el.classList.remove('active');
            });
            element.classList.add('active');
        });
    });
});



document.querySelectorAll('.jumlah-item').forEach(item => {
  item.addEventListener('click', () => {
      const harga = item.getAttribute('data-harga');
      document.querySelector('.harga').textContent = 'IDR ' + harga;

      // Mengupdate harga di setiap kartu metode pembayaran
      document.querySelectorAll('.wrap').forEach(card => {
          const cardHarga = card.querySelector('.wrap-harga h3');
          cardHarga.textContent = harga;
      });

      // Mengupdate harga diamond di input hidden
      document.querySelector('#harga_diamond').value = harga;

      // Menghapus kelas 'active' dari semua jumlah-item
      document.querySelectorAll('.jumlah-item').forEach(i => i.classList.remove('active'));
      // Menambahkan kelas 'active' pada item yang dipilih
      item.classList.add('active');
  });
});

// // Pastikan input hidden harga_diamond terkirim saat form disubmit
// document.querySelector('#form-konfirmasi').addEventListener('submit', (e) => {
//     const hargaDiamondInput = document.querySelector('#harga_diamond');
//     if (!hargaDiamondInput.value) {
//         alert('Harga diamond belum dipilih!');
//         e.preventDefault(); // Mencegah form disubmit jika harga_diamond belum dipilih
//     }
// });


  



// document.addEventListener("DOMContentLoaded", () => {
//   new Swiper('#swiper-container', {
//       slidesPerView: 'auto', // Sesuaikan jumlah slide yang terlihat
//       spaceBetween: 10, // Jarak antar slide
//       freeMode: true, // Scroll bebas tanpa snap
//       scrollbar: {
//           el: '.swiper-scrollbar',
//           draggable: true,
//       },
//   });
// });








