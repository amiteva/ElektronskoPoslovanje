package ep.rest

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.TextView
import kotlinx.android.synthetic.main.activity_main.*
import kotlinx.android.synthetic.main.activity_prvi_izdelek.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class prviIzdelek : AppCompatActivity() {
    private var podatek: Izdelek = Izdelek()


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_prvi_izdelek)

        //IzdelekService.instance.getAll().enqueue(OnLoadCallbacks(this))

        val opis1 = findViewById<TextView>(R.id.opis)
        val naslov = findViewById<TextView>(R.id.naslov)
        val cenica = findViewById<TextView>(R.id.cena)

        val opis = intent.getStringExtra("opis")
        val ime = intent.getStringExtra("naslov")
        val cena = intent.getDoubleExtra("price", 0.0)


        opis1.text = opis.toString()
        naslov.text = ime
        cenica.text = "Cena izdelka je " + cena + "e"

        btnNazaj.setOnClickListener{
            val intent = Intent(this, MainActivity::class.java)
            startActivity(intent)
        }
    }
}
