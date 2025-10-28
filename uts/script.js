function generateCode(length = 8) {
    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    return Array.from({ length }, () => chars.charAt(Math.floor(Math.random() * chars.length))).join('');
}

function getData() {
    return JSON.parse(localStorage.getItem('riwayatSampah') || '[]');
}

function saveData(data) {
    localStorage.setItem('riwayatSampah', JSON.stringify(data));
}

function showPopupNotif(msg) {
    const popup = document.getElementById('popupNotif');
    document.getElementById('popupMessage').innerText = msg;
    popup.style.display = 'flex';
}

function tutupPopupNotif() {
    document.getElementById('popupNotif').style.display = 'none';
}

function renderData() {
    const list = document.getElementById('riwayatList');
    const data = getData();
    const search = document.getElementById('search').value.toLowerCase();

    list.innerHTML = '';

    const hasil = data.filter(item => item.nama.toLowerCase().includes(search));

    if (hasil.length === 0) {
        list.innerHTML = "<p style='text-align:center;color:#777;'>Belum ada riwayat pelanggan.</p>";
        return;
    }

    hasil.reverse().forEach(item => {
        const card = document.createElement('div');
        card.className = 'card';
        card.innerHTML = `
        <div>
          <div>${new Date(item.tanggal).toLocaleString('id-ID')} WIB</div>
          <div><strong>${item.nama}</strong></div>
          <div>No: ${item.nohp}<br>${item.alamat} </div>
        </div>
        <div class="kanan">
          <strong>${item.berat} Kg <br> ${item.email}</strong><br>
          <span class="${item.jenis === 'Organik' ? 'hijau' : 'biru'}">${item.jenis}</span><br>
          <small>Total: Rp${item.total.toLocaleString('id-ID')}</small>
        </div>
      `;
        card.onclick = () => bukaPopupDetail(item.kode);
        list.appendChild(card);
    });
}

document.getElementById('formPelanggan').addEventListener('submit', e => {
    e.preventDefault();
    const nama = document.getElementById('nama').value;
    const alamat = document.getElementById('alamat').value;
    const nohp = document.getElementById('nohp').value;
    const email = document.getElementById('email').value;
    const berat = parseFloat(document.getElementById('berat').value);
    const jenis = document.getElementById('jenis').value;

    if (berat < 10) {
        showPopupNotif("Gagal! Minimal berat sampah 10 Kg.");
        return;
    }

    const harga = jenis === 'Organik' ? 2000 : 3000;
    const total = harga * berat;

    const data = getData();
    data.push({
        kode: generateCode(),
        tanggal: new Date(),
        nama, alamat, nohp, email, berat, jenis, total
    });

    saveData(data);
    e.target.reset();
    renderData();
    showPopupNotif(" Pelanggan berhasil ditambahkan!");
});

document.getElementById('search').addEventListener('input', renderData);

function bukaPopupDetail(kode) {
    const data = getData();
    const item = data.find(i => i.kode === kode);
    if (!item) return;

    const detail = `
      <p><strong>Nama:</strong> ${item.nama}</p>
      <p><strong>Alamat:</strong> ${item.alamat}</p>
      <p><strong>No HP:</strong> ${item.nohp}</p>
      <p><strong>Email:</strong> ${item.email}</p>
      <p><strong>Jenis Sampah:</strong> ${item.jenis}</p>
      <p><strong>Berat:</strong> ${item.berat} Kg</p>
      <p><strong>Total:</strong> Rp${item.total.toLocaleString('id-ID')}</p>
      <p><strong>Tanggal:</strong> ${new Date(item.tanggal).toLocaleString('id-ID')} WIB</p>
      <p><strong>Kode Transaksi:</strong> ${item.kode}</p>
    `;

    document.getElementById('detailContainer').innerHTML = detail;
    const popup = document.getElementById('popupDetail');
    popup.style.display = 'flex';

    const hapusBtn = document.getElementById('hapusBtn');
    hapusBtn.onclick = function () {
        if (confirm("Yakin ingin menghapus riwayat ini?")) {
            const baru = data.filter(i => i.kode !== kode);
            saveData(baru);
            renderData();
            popup.style.display = 'none';
            showPopupNotif("🗑️ Riwayat berhasil dihapus.");
        }
    };
}

function tutupPopupDetail() {
    document.getElementById('popupDetail').style.display = 'none';
}

renderData();
