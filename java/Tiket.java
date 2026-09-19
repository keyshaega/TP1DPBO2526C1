public class Tiket {

    // constructor
    public Tiket(String idTiket, String namaFilm, String studio,
                 String jamTayang, String nomorKursi, int harga) {

        this.idTiket = String.valueOf(idTiket);
        this.namaFilm = String.valueOf(namaFilm);
        this.studio = String.valueOf(studio);
        this.jamTayang = String.valueOf(jamTayang);
        this.nomorKursi = String.valueOf(nomorKursi);
        this.harga = harga;
    }

    // getter
    public String getIdTiket() {
        return idTiket;
    }

    public String getNamaFilm() {
        return namaFilm;
    }

    public String getStudio() {
        return studio;
    }

    public String getJamTayang() {
        return jamTayang;
    }

    public String getNomorKursi() {
        return nomorKursi;
    }

    public int getHarga() {
        return harga;
    }

    // setter
    public void setIdTiket(String idTiket) {
        this.idTiket = String.valueOf(idTiket);
    }

    public void setNamaFilm(String namaFilm) {
        this.namaFilm = String.valueOf(namaFilm);
    }

    public void setStudio(String studio) {
        this.studio = String.valueOf(studio);
    }

    public void setJamTayang(String jamTayang) {
        this.jamTayang = String.valueOf(jamTayang);
    }

    public void setNomorKursi(String nomorKursi) {
        this.nomorKursi = String.valueOf(nomorKursi);
    }

    public void setHarga(int harga) {
        this.harga = harga;
    }

    // attribute
    private String idTiket;
    private String namaFilm;
    private String studio;
    private String jamTayang;
    private String nomorKursi;
    private int harga;
}