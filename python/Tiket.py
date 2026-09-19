class Tiket:

    #constructor
    def __init__(self, idTiket:str, namaFilm:str, studio:str, jamTayang:str, nomorKursi:str, harga:int):
        self.__idTiket = str(idTiket)
        self.__namaFilm = str(namaFilm)
        self.__studio = str(studio)
        self.__jamTayang = str(jamTayang)
        self.__nomorKursi = str(nomorKursi)
        self.__harga = int(harga)

    #getter
    def getIdTiket(self) -> str:
        return self.__idTiket

    def getNamaFilm(self) -> str:
        return self.__namaFilm

    def getStudio(self) -> str:
        return self.__studio

    def getJamTayang(self) -> str:
        return self.__jamTayang

    def getNomorKursi(self) -> str:
        return self.__nomorKursi

    def getHarga(self) -> int:
        return self.__harga

    #setter
    def setIdTiket(self, idTiket:str) -> None:
        self.__idTiket = str(idTiket)

    def setNamaFilm(self, namaFilm:str) -> None:
        self.__namaFilm = str(namaFilm)

    def setStudio(self, studio:str) -> None:
        self.__studio = str(studio)

    def setJamTayang(self, jamTayang:str) -> None:
        self.__jamTayang = str(jamTayang)

    def setNomorKursi(self, nomorKursi:str) -> None:
        self.__nomorKursi = str(nomorKursi)

    def setHarga(self, harga:int) -> None:
        self.__harga = int(harga)