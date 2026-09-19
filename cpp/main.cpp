#include <iostream>
#include <vector>
#include <string>
#include <sstream>

using namespace std;

const string MERAH = "\033[91m";
const string HIJAU = "\033[92m";
const string RESET = "\033[0m";


class Tiket {

private:
    string idTiket;
    string namaFilm;
    string studio;
    string jamTayang;
    string nomorKursi;
    int harga;

public:

    // constructor
    Tiket(string idTiket, string namaFilm, string studio,
          string jamTayang, string nomorKursi, int harga) {

        this->idTiket = idTiket;
        this->namaFilm = namaFilm;
        this->studio = studio;
        this->jamTayang = jamTayang;
        this->nomorKursi = nomorKursi;
        this->harga = harga;
    }

    // getter
    string getIdTiket() {
        return idTiket;
    }

    string getNamaFilm() {
        return namaFilm;
    }

    string getStudio() {
        return studio;
    }

    string getJamTayang() {
        return jamTayang;
    }

    string getNomorKursi() {
        return nomorKursi;
    }

    int getHarga() {
        return harga;
    }

    // setter
    void setIdTiket(string idTiket) {
        this->idTiket = idTiket;
    }

    void setNamaFilm(string namaFilm) {
        this->namaFilm = namaFilm;
    }

    void setStudio(string studio) {
        this->studio = studio;
    }

    void setJamTayang(string jamTayang) {
        this->jamTayang = jamTayang;
    }

    void setNomorKursi(string nomorKursi) {
        this->nomorKursi = nomorKursi;
    }

    void setHarga(int harga) {
        this->harga = harga;
    }
};


// cari data tiket
Tiket* cariData(vector<Tiket>& daftarTiket, string idTiket) {

    for (int i = 0; i < daftarTiket.size(); i++) {

        if (daftarTiket[i].getIdTiket() == idTiket) {
            return &daftarTiket[i];
        }
    }

    return nullptr;
}


// tambah data
void tambahData(vector<Tiket>& daftarTiket) {

    cout << "\n=====================================================\n";
    cout << "|                 TAMBAH DATA TIKET                 |\n";
    cout << "=====================================================\n";

    string idTiket;

    cout << " ID Tiket       : ";
    cin >> idTiket;

    // cek ID tiket sudah ada
    if (cariData(daftarTiket, idTiket) != nullptr) {

        cout << "=====================================================\n";
        cout << MERAH << " Error: ID Tiket sudah digunakan." << RESET << endl;
        cout << "=====================================================\n";

        return;
    }

    string namaFilm;
    string studio;
    string jamTayang;
    string nomorKursi;
    int harga;

    cin.ignore();

    cout << " Nama Film      : ";
    getline(cin, namaFilm);

    cout << " Studio         : ";
    getline(cin, studio);

    // error handling jam tayang
    cout << " Jam Tayang     : ";
    cin >> jamTayang;

    try {

        int jam;
        int menit;
        char titikDua;

        stringstream ss(jamTayang);
        ss >> jam >> titikDua >> menit;

        if (ss.fail() || titikDua != ':' ||
            jam < 0 || jam > 23 ||
            menit < 0 || menit > 59) {

            throw 1;
        }

    } catch (...) {

        cout << "=====================================================\n";
        cout << MERAH << " Error: Jam tayang harus menggunakan format HH:MM."
             << RESET << endl;
        cout << "=====================================================\n";

        return;
    }

    cout << " Nomor Kursi    : ";
    cin >> nomorKursi;

    // error handling harga
    cout << " Harga          : ";

    if (!(cin >> harga)) {

        cout << "=====================================================\n";
        cout << MERAH << " Error: Harga harus berupa angka." << RESET << endl;
        cout << "=====================================================\n";

        cin.clear();
        cin.ignore(1000, '\n');

        return;
    }

    Tiket tiket(
        idTiket,
        namaFilm,
        studio,
        jamTayang,
        nomorKursi,
        harga
    );

    daftarTiket.push_back(tiket);

    cout << "=====================================================\n";
    cout << HIJAU << "Data tiket berhasil ditambahkan." << RESET << endl;
    cout << "=====================================================\n";
}


// tampilkan data
void tampilkanData(vector<Tiket>& daftarTiket) {

    cout << "\n=========================================\n";
    cout << "|               DATA TIKET              |\n";
    cout << "=========================================\n";

    if (daftarTiket.size() == 0) {

        cout << "Belum ada data tiket." << endl;

    } else {

        for (int i = 0; i < daftarTiket.size(); i++) {

            cout << " ID Tiket       : "
                 << daftarTiket[i].getIdTiket() << endl;

            cout << " Nama Film      : "
                 << daftarTiket[i].getNamaFilm() << endl;

            cout << " Studio         : "
                 << daftarTiket[i].getStudio() << endl;

            cout << " Jam Tayang     : "
                 << daftarTiket[i].getJamTayang() << endl;

            cout << " Nomor Kursi    : "
                 << daftarTiket[i].getNomorKursi() << endl;

            cout << " Harga          : "
                 << daftarTiket[i].getHarga() << endl;

            cout << "-----------------------------------------\n";
        }
    }
}


// update data
void updateData(vector<Tiket>& daftarTiket) {

    cout << "\n=====================================================\n";
    cout << "|                 UPDATE DATA TIKET                 |\n";
    cout << "=====================================================\n";

    string idTiket;

    cout << " Masukkan ID Tiket: ";
    cin >> idTiket;

    Tiket* tiket = cariData(daftarTiket, idTiket);

    if (tiket != nullptr) {

        cout << HIJAU << " Data ditemukan." << RESET << endl;

        string namaFilm;
        string studio;
        string jamTayang;
        string nomorKursi;
        int harga;

        cin.ignore();

        cout << " Nama Film baru   : ";
        getline(cin, namaFilm);

        cout << " Studio baru      : ";
        getline(cin, studio);

        // error handling jam tayang
        cout << " Jam Tayang baru  : ";
        cin >> jamTayang;

        try {

            int jam;
            int menit;
            char titikDua;

            stringstream ss(jamTayang);
            ss >> jam >> titikDua >> menit;

            if (ss.fail() || titikDua != ':' ||
                jam < 0 || jam > 23 ||
                menit < 0 || menit > 59) {

                throw 1;
            }

        } catch (...) {

            cout << "=====================================================\n";
            cout << MERAH
                 << " Error: Jam tayang harus menggunakan format HH:MM."
                 << RESET << endl;
            cout << "=====================================================\n";

            return;
        }

        cout << " Nomor Kursi baru : ";
        cin >> nomorKursi;

        // error handling harga
        cout << " Harga baru       : ";

        if (!(cin >> harga)) {

            cout << "=====================================================\n";
            cout << MERAH << " Error: Harga harus berupa angka."
                 << RESET << endl;
            cout << "=====================================================\n";

            cin.clear();
            cin.ignore(1000, '\n');

            return;
        }

        tiket->setNamaFilm(namaFilm);
        tiket->setStudio(studio);
        tiket->setJamTayang(jamTayang);
        tiket->setNomorKursi(nomorKursi);
        tiket->setHarga(harga);

        cout << "=====================================================\n";
        cout << HIJAU << " Data tiket berhasil diupdate." << RESET << endl;
        cout << "=====================================================\n";

    } else {

        cout << "=====================================================\n";
        cout << MERAH << " Error: Data tidak ditemukan." << RESET << endl;
        cout << "=====================================================\n";
    }
}


// hapus data
void hapusData(vector<Tiket>& daftarTiket) {

    cout << "\n=========================================\n";
    cout << "|             HAPUS DATA TIKET          |\n";
    cout << "=========================================\n";

    string idTiket;

    cout << " Masukkan ID Tiket: ";
    cin >> idTiket;

    for (int i = 0; i < daftarTiket.size(); i++) {

        if (daftarTiket[i].getIdTiket() == idTiket) {

            daftarTiket.erase(daftarTiket.begin() + i);

            cout << "=========================================\n";
            cout << HIJAU << " Data tiket berhasil dihapus."
                 << RESET << endl;
            cout << "=========================================\n";

            return;
        }
    }

    cout << "=========================================\n";
    cout << MERAH << " Data tiket tidak ditemukan."
         << RESET << endl;
    cout << "=========================================\n";
}


// main
int main() {

    // buat list object tiket
    vector<Tiket> daftarTiket;

    // buat 2 object tiket
    Tiket t1(
        "T001",
        "Interstellar",
        "Studio 1",
        "13:00",
        "A05",
        50000
    );

    Tiket t2(
        "T002",
        "Inside Out 2",
        "Studio 2",
        "15:30",
        "B10",
        45000
    );

    daftarTiket.push_back(t1);
    daftarTiket.push_back(t2);

    int pilihan = -1;

    while (pilihan != 0) {

        cout << "\n=========================================\n";
        cout << "|             SISTEM BIOSKOP            |\n";
        cout << "=========================================\n";
        cout << "| 1. Tambah Data                        |\n";
        cout << "| 2. Tampilkan Data                     |\n";
        cout << "| 3. Update Data                        |\n";
        cout << "| 4. Hapus Data                         |\n";
        cout << "| 5. Cari Data                          |\n";
        cout << "| 0. Keluar                             |\n";
        cout << "=========================================\n";

        // error handling pilihan menu
        cout << " Pilih menu: ";

        if (!(cin >> pilihan)) {

            cout << "=========================================\n";
            cout << MERAH << " Error: Pilihan harus berupa angka."
                 << RESET << endl;
            cout << "=========================================\n";

            cin.clear();
            cin.ignore(1000, '\n');

            pilihan = -1;
            continue;
        }


        if (pilihan == 1) {

            tambahData(daftarTiket);

        } else if (pilihan == 2) {

            tampilkanData(daftarTiket);

        } else if (pilihan == 3) {

            updateData(daftarTiket);

        } else if (pilihan == 4) {

            hapusData(daftarTiket);

        } else if (pilihan == 5) {

            cout << "\n=========================================\n";
            cout << "|             CARI DATA TIKET           |\n";
            cout << "=========================================\n";

            string idTiket;

            cout << " Masukkan ID Tiket: ";
            cin >> idTiket;

            Tiket* tiket = cariData(daftarTiket, idTiket);

            if (tiket != nullptr) {

                cout << "=========================================\n";
                cout << HIJAU << " Data tiket ditemukan."
                    << RESET << endl;

                cout << " ID Tiket       : "
                    << tiket->getIdTiket() << endl;

                cout << " Nama Film      : "
                    << tiket->getNamaFilm() << endl;

                cout << " Studio         : "
                    << tiket->getStudio() << endl;

                cout << " Jam Tayang     : "
                    << tiket->getJamTayang() << endl;

                cout << " Nomor Kursi    : "
                    << tiket->getNomorKursi() << endl;

                cout << " Harga          : "
                    << tiket->getHarga() << endl;

                cout << "=========================================\n";

            } else {

                cout << "=========================================\n";
                cout << MERAH << " Data tiket tidak ditemukan."
                    << RESET << endl;
                cout << "=========================================\n";
            }

        } else if (pilihan == 0) {

            cout << "=========================================\n";
            cout << HIJAU << " Program selesai." << RESET << endl;
            cout << "=========================================\n";

        } else {

            cout << "=========================================\n";
            cout << MERAH << " Error: Pilihan tidak tersedia."
                << RESET << endl;
            cout << "=========================================\n";
        }
    }

    return 0;
}