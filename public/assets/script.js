// Fungsi untuk membuka popup
function openPopup() {
    document.getElementById('popup').style.display = 'block';
}

// Fungsi untuk menutup popup
function closePopup() {
    document.getElementById('popup').style.display = 'none';
}

// Tambahkan event listener pada tombol tutup
document.getElementsByClassName('close')[0].addEventListener('click', closePopup);

// Tambahkan event listener pada tombol yang membuka popup
document.getElementById('open-popup-btn').addEventListener('click', openPopup);
