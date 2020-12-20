package ep.rest

import java.io.Serializable

data class Uporabnik (
        val uprIme: String = "",
        val uprGeslo: String = ""
        ) : Serializable