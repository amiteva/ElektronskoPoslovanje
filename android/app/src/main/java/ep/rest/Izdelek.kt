package ep.rest

import java.io.Serializable

data class Izdelek(
        val id: Int = 0,
        val ime: String = "",
        val year: Int = 0,
        val brand: String = "",
        val opis: String = "",
        val price: Double = 0.0) : Serializable
