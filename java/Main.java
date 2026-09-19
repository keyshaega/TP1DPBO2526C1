import java.util.ArrayList;
import java.util.Scanner;

public class Main {

    static final String MERAH = "\u001B[91m";
    static final String HIJAU = "\u001B[92m";
    static final String RESET = "\u001B[0m";

    static Scanner input = new Scanner(System.in);

    public static void tambahData(ArrayList<Tiket> daftarTiket) {

        System.out.println("\n=====================================================");
        System.out.println("|                 TAMBAH DATA TIKET                 |");
        System.out.println("=====================================================");

        System.out.print(" ID Tiket       : ");
        String idTiket = input.nextLine();

        // cek ID tiket sudah ada
        if (cariData(daftarTiket, idTiket) != null) {
            System.out.println("=====================================================");
            System.out.println(MERAH + " Error: ID Tiket sudah digunakan." + RESET);
            System.out.println("=====================================================");
            return;
        }

        System.out.print(" Nama Film      : ");
        String namaFilm = input.nextLine();

        System.out.print(" Studio         : ");
        String studio = input.nextLine();

        // error handling jam tayang
        System.out.print(" Jam Tayang     : ");
        String jamTayang = input.nextLine();

        try {
            String[] waktu = jamTayang.split(":");

            if (waktu.length != 2) {
                throw new Exception();
            }

            int jam = Integer.parseInt(waktu[0]);
            int menit = Integer.parseInt(waktu[1]);

            if (jam < 0 || jam > 23 || menit < 0 || menit > 59) {
                System.out.println("=====================================================");
                System.out.println(MERAH + " Error: Jam tayang harus antara 00:00 sampai 23:59." + RESET);
                System.out.println("=====================================================");
                return;
            }

        } catch (Exception e) {
            System.out.println("=====================================================");
            System.out.println(MERAH + " Error: Jam tayang harus menggunakan format HH:MM." + RESET);
            System.out.println("=====================================================");
            return;
        }

        System.out.print(" Nomor Kursi    : ");
        String nomorKursi = input.nextLine();

        // error handling harga
        System.out.print(" Harga          : ");
        int harga;

        try {
            harga = Integer.parseInt(input.nextLine());
        } catch (Exception e) {
            System.out.println("=====================================================");
            System.out.println(MERAH + " Error: Harga harus berupa angka." + RESET);
            System.out.println("=====================================================");
            return;
        }

        Tiket tiket = new Tiket(
                idTiket,
                namaFilm,
                studio,
                jamTayang,
                nomorKursi,
                harga
        );

        daftarTiket.add(tiket);

        System.out.println("=====================================================");
        System.out.println(HIJAU + "Data tiket berhasil ditambahkan." + RESET);
        System.out.println("=====================================================");
    }


    public static void tampilkanData(ArrayList<Tiket> daftarTiket) {

        System.out.println("\n=========================================");
        System.out.println("|               DATA TIKET              |");
        System.out.println("=========================================");

        if (daftarTiket.size() == 0) {
            System.out.println("Belum ada data tiket.");
        } else {

            for (Tiket tiket : daftarTiket) {

                System.out.println(" ID Tiket       : " + tiket.getIdTiket());
                System.out.println(" Nama Film      : " + tiket.getNamaFilm());
                System.out.println(" Studio         : " + tiket.getStudio());
                System.out.println(" Jam Tayang     : " + tiket.getJamTayang());
                System.out.println(" Nomor Kursi    : " + tiket.getNomorKursi());
                System.out.println(" Harga          : " + tiket.getHarga());
                System.out.println("-----------------------------------------");
            }
        }
    }


    public static Tiket cariData(ArrayList<Tiket> daftarTiket, String idTiket) {

        for (Tiket tiket : daftarTiket) {

            if (tiket.getIdTiket().equals(idTiket)) {
                return tiket;
            }
        }

        return null;
    }


    public static void updateData(ArrayList<Tiket> daftarTiket) {

        System.out.println("\n=====================================================");
        System.out.println("|                 UPDATE DATA TIKET                 |");
        System.out.println("=====================================================");

        System.out.print(" Masukkan ID Tiket: ");
        String idTiket = input.nextLine();

        Tiket tiket = cariData(daftarTiket, idTiket);

        if (tiket != null) {

            System.out.println(HIJAU + " Data ditemukan." + RESET);

            System.out.print(" Nama Film baru   : ");
            String namaFilm = input.nextLine();

            System.out.print(" Studio baru      : ");
            String studio = input.nextLine();

            // error handling jam tayang
            System.out.print(" Jam Tayang baru  : ");
            String jamTayang = input.nextLine();

            try {

                String[] waktu = jamTayang.split(":");

                if (waktu.length != 2) {
                    throw new Exception();
                }

                int jam = Integer.parseInt(waktu[0]);
                int menit = Integer.parseInt(waktu[1]);

                if (jam < 0 || jam > 23 || menit < 0 || menit > 59) {

                    System.out.println("=====================================================");
                    System.out.println(MERAH + " Error: Jam tayang harus antara 00:00 sampai 23:59." + RESET);
                    System.out.println("=====================================================");
                    return;
                }

            } catch (Exception e) {

                System.out.println("=====================================================");
                System.out.println(MERAH + " Error: Jam tayang harus menggunakan format HH:MM." + RESET);
                System.out.println("=====================================================");
                return;
            }

            System.out.print(" Nomor Kursi baru : ");
            String nomorKursi = input.nextLine();

            // error handling harga
            
            System.out.print(" Harga Baru       : ");
            int harga;

            try {
                harga = Integer.parseInt(input.nextLine());

            } catch (Exception e) {

                System.out.println("=====================================================");
                System.out.println(MERAH + " Error: Harga harus berupa angka." + RESET);
                System.out.println("=====================================================");
                return;
            }

            tiket.setNamaFilm(namaFilm);
            tiket.setStudio(studio);
            tiket.setJamTayang(jamTayang);
            tiket.setNomorKursi(nomorKursi);
            tiket.setHarga(harga);

            System.out.println("=====================================================");
            System.out.println(HIJAU + " Data tiket berhasil diupdate." + RESET);
            System.out.println("=====================================================");

        } else {

            System.out.println("=====================================================");
            System.out.println(MERAH + " Error: Data tidak ditemukan." + RESET);
            System.out.println("=====================================================");
        }
    }


    public static void hapusData(ArrayList<Tiket> daftarTiket) {

        System.out.println("\n=========================================");
        System.out.println("|             HAPUS DATA TIKET          |");
        System.out.println("=========================================");

        System.out.print(" Masukkan ID Tiket: ");
        String idTiket = input.nextLine();

        Tiket tiket = cariData(daftarTiket, idTiket);

        if (tiket != null) {

            daftarTiket.remove(tiket);

            System.out.println("=========================================");
            System.out.println(HIJAU + " Data tiket berhasil dihapus." + RESET);
            System.out.println("=========================================");

        } else {

            System.out.println("=========================================");
            System.out.println(MERAH + " Data tiket tidak ditemukan." + RESET);
            System.out.println("=========================================");
        }
    }


    public static void main(String[] args) {

        // buat list object tiket
        ArrayList<Tiket> daftarTiket = new ArrayList<>();

        // buat 2 object tiket
        Tiket t1 = new Tiket(
                "T001",
                "Interstellar",
                "Studio 1",
                "13:00",
                "A05",
                50000
        );

        Tiket t2 = new Tiket(
                "T002",
                "Inside Out 2",
                "Studio 2",
                "15:30",
                "B10",
                45000
        );

        daftarTiket.add(t1);
        daftarTiket.add(t2);

        int pilihan = -1;

        while (pilihan != 0) {

            System.out.println("\n=========================================");
            System.out.println("|             SISTEM BIOSKOP            |");
            System.out.println("=========================================");
            System.out.println("| 1. Tambah Data                        |");
            System.out.println("| 2. Tampilkan Data                     |");
            System.out.println("| 3. Update Data                        |");
            System.out.println("| 4. Hapus Data                         |");
            System.out.println("| 5. Cari Data                          |");
            System.out.println("| 0. Keluar                             |");
            System.out.println("=========================================");

            // error handling pilihan menu
            System.out.print(" Pilih menu: ");

            try {

                pilihan = Integer.parseInt(input.nextLine());

            } catch (Exception e) {

                System.out.println("=========================================");
                System.out.println(MERAH + " Error: Pilihan harus berupa angka." + RESET);
                System.out.println("=========================================");

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

                System.out.println("\n=========================================");
                System.out.println("|             CARI DATA TIKET           |");
                System.out.println("=========================================");

                System.out.print(" Masukkan ID Tiket: ");
                String idTiket = input.nextLine();

                Tiket tiket = cariData(daftarTiket, idTiket);

                if (tiket != null) {

                    System.out.println("=========================================");
                    System.out.println(HIJAU + " Data tiket ditemukan." + RESET);

                    System.out.println(" ID Tiket       : " + tiket.getIdTiket());
                    System.out.println(" Nama Film      : " + tiket.getNamaFilm());
                    System.out.println(" Studio         : " + tiket.getStudio());
                    System.out.println(" Jam Tayang     : " + tiket.getJamTayang());
                    System.out.println(" Nomor Kursi    : " + tiket.getNomorKursi());
                    System.out.println(" Harga          : " + tiket.getHarga());
                    System.out.println("=========================================");

                } else {

                    System.out.println("=========================================");
                    System.out.println(MERAH + " Data tiket tidak ditemukan." + RESET);
                    System.out.println("=========================================");
                }

            } else if (pilihan == 0) {

                System.out.println("=========================================");
                System.out.println(HIJAU + " Program selesai." + RESET);
                System.out.println("=========================================");

            } else {

                System.out.println("=========================================");
                System.out.println(MERAH + " Error: Pilihan tidak tersedia." + RESET);
                System.out.println("=========================================");
            }
        }

        input.close();
    }
}