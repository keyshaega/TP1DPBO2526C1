from Tiket import Tiket
MERAH = "\033[91m"
HIJAU = "\033[92m"
RESET = "\033[0m"


def tambahData(daftarTiket):
    print("\n=====================================================")
    print("|                 TAMBAH DATA TIKET                 |")
    print("=====================================================")

    idTiket = input(" ID Tiket       : ")

    # cek ID tiket sudah ada
    if cariData(daftarTiket, idTiket) != None:
        print("=====================================================")
        print(MERAH + " Error: ID Tiket sudah digunakan." + RESET)
        print("=====================================================")
        return

    namaFilm = input(" Nama Film      : ")
    studio = input(" Studio         : ")

    # error handling jam tayang
    jamTayang = input(" Jam Tayang     : ")

    try:
        jam, menit = jamTayang.split(":")
        jam = int(jam)
        menit = int(menit)

        if jam < 0 or jam > 23 or menit < 0 or menit > 59:
            print("=====================================================")
            print(MERAH + " Error: Jam tayang harus antara 00:00 sampai 23:59." + RESET)
            print("=====================================================")
            return

    except ValueError:
        print("=====================================================")
        print(MERAH + " Error: Jam tayang harus menggunakan format HH:MM." + RESET)
        print("=====================================================")
        return

    nomorKursi = input(" Nomor Kursi    : ")

    # error handling harga
    try:
        harga = int(input(" Harga          : "))
    except ValueError:
        print("=====================================================")
        print(MERAH + " Error: Harga harus berupa angka." + RESET)
        print("=====================================================")
        return

    tiket = Tiket(idTiket, namaFilm, studio, jamTayang, nomorKursi, harga)
    daftarTiket.append(tiket)

    print("=====================================================")
    print(HIJAU + "Data tiket berhasil ditambahkan." + RESET)
    print("=====================================================")

def tampilkanData(daftarTiket):
    print("\n=========================================")
    print("|               DATA TIKET              |")
    print("=========================================")

    if len(daftarTiket) == 0:
        print("Belum ada data tiket.")
    else:
        for tiket in daftarTiket:
            print(" ID Tiket       :", tiket.getIdTiket())
            print(" Nama Film      :", tiket.getNamaFilm())
            print(" Studio         :", tiket.getStudio())
            print(" Jam Tayang     :", tiket.getJamTayang())
            print(" Nomor Kursi    :", tiket.getNomorKursi())
            print(" Harga          :", tiket.getHarga())
            print("-----------------------------------------")


def cariData(daftarTiket, idTiket):
    for tiket in daftarTiket:
        if tiket.getIdTiket() == idTiket:
            return tiket

    return None


def updateData(daftarTiket):
    print("\n=====================================================")
    print("|                 UPDATE DATA TIKET                 |")
    print("=====================================================")

    idTiket = input(" Masukkan ID Tiket: ")

    tiket = cariData(daftarTiket, idTiket)

    if tiket != None:
        print(HIJAU + " Data ditemukan." + RESET)

        namaFilm = input(" Nama Film baru   : ")
        studio = input(" Studio baru      : ")

        # error handling jam tayang
        jamTayang = input(" Jam Tayang baru  : ")

        try:
            jam, menit = jamTayang.split(":")
            jam = int(jam)
            menit = int(menit)

            if jam < 0 or jam > 23 or menit < 0 or menit > 59:
                print("=====================================================")
                print(MERAH + " Error: Jam tayang harus antara 00:00 sampai 23:59." + RESET)
                print("=====================================================")
                return

        except ValueError:
            print("=====================================================")
            print(MERAH + " Error: Jam tayang harus menggunakan format HH:MM." + RESET)
            print("=====================================================")
            return

        nomorKursi = input(" Nomor Kursi baru : ")

        # error handling harga
        try:
            harga = int(input(" Harga baru       : "))
        except ValueError:
            print("=====================================================")
            print(MERAH + " Error: Harga harus berupa angka." + RESET)
            print("=====================================================")
            return

        tiket.setNamaFilm(namaFilm)
        tiket.setStudio(studio)
        tiket.setJamTayang(jamTayang)
        tiket.setNomorKursi(nomorKursi)
        tiket.setHarga(harga)

        print("=====================================================")
        print(HIJAU + " Data tiket berhasil diupdate." + RESET)
        print("=====================================================")

    else:
        print("=====================================================")
        print(MERAH + " Error: Data tidak ditemukan." + RESET)
        print("=====================================================")


def hapusData(daftarTiket):
    print("\n=========================================")
    print("|             HAPUS DATA TIKET          |")
    print("=========================================")

    idTiket = input(" Masukkan ID Tiket: ")

    tiket = cariData(daftarTiket, idTiket)

    if tiket != None:
        daftarTiket.remove(tiket)
        print("=========================================")
        print(HIJAU + " Data tiket berhasil dihapus." + RESET)
        print("=========================================")
    else:
        print("=========================================")
        print(MERAH + " Data tiket tidak ditemukan." + RESET)
        print("=========================================")


def main():

    # buat list object tiket
    daftarTiket = []

    # buat 2 object tiket
    t1 = Tiket("T001", "Interstellar", "Studio 1", "13:00", "A05", 50000)
    t2 = Tiket("T002", "Inside Out 2", "Studio 2", "15:30", "B10", 45000)

    daftarTiket.append(t1)
    daftarTiket.append(t2)

    pilihan = -1

    while pilihan != 0:

        print("\n=========================================")
        print("|             SISTEM BIOSKOP            |")
        print("=========================================")
        print("| 1. Tambah Data                        |")
        print("| 2. Tampilkan Data                     |")
        print("| 3. Update Data                        |")
        print("| 4. Hapus Data                         |")
        print("| 5. Cari Data                          |")
        print("| 0. Keluar                             |")
        print("=========================================")

        # error handling pilihan menu
        try:
            pilihan = int(input(" Pilih menu: "))
        except ValueError:
            print("=========================================")
            print(MERAH + " Error: Pilihan harus berupa angka." + RESET)
            print("=========================================")
            pilihan = -1
            continue

        if pilihan == 1:
            tambahData(daftarTiket)

        elif pilihan == 2:
            tampilkanData(daftarTiket)

        elif pilihan == 3:
            updateData(daftarTiket)

        elif pilihan == 4:
            hapusData(daftarTiket)

        elif pilihan == 5:
            print("\n=========================================")
            print("|             CARI DATA TIKET           |")
            print("=========================================")

            idTiket = input(" Masukkan ID Tiket: ")

            tiket = cariData(daftarTiket, idTiket)

            if tiket != None:
                print("=========================================")
                print(HIJAU + " Data tiket ditemukan." + RESET)
                print(" ID Tiket       :", tiket.getIdTiket())
                print(" Nama Film      :", tiket.getNamaFilm())
                print(" Studio         :", tiket.getStudio())
                print(" Jam Tayang     :", tiket.getJamTayang())
                print(" Nomor Kursi    :", tiket.getNomorKursi())
                print(" Harga          :", tiket.getHarga())
                print("=========================================")

            else:
                print("=========================================")
                print(MERAH + " Data tiket tidak ditemukan." + RESET)
                print("=========================================")

        elif pilihan == 0:
            print("=========================================")
            print(HIJAU + " Program selesai." + RESET)
            print("=========================================")

        else:
            print("=========================================")
            print(MERAH + " Error: Pilihan tidak tersedia." + RESET)
            print("=========================================")


if __name__ == "__main__":
    main()