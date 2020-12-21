package ep.rest

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.ImageView
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
        val slika = findViewById<ImageView>(R.id.imageView)

        val opis = intent.getStringExtra("opis")
        val ime = intent.getStringExtra("naslov")
        val cena = intent.getDoubleExtra("price", 0.0)
        val slikca = intent.getStringExtra("slika")


        opis1.text = opis.toString()
        naslov.text = ime
        cenica.text = "Cena izdelka je " + cena + "e"
        val delaj =
        slika.setImageResource(R.drawable.slikca)

        // Nazaj:
        btnNazaj.setOnClickListener{
            val intent = Intent(this, MainActivity::class.java)
            startActivity(intent)
        }

        // Kosarica:
        btnKosarica.setOnClickListener{
            val intent = Intent(this, KolikoActivity::class.java)
            intent.putExtra("cena1", cena)
            intent.putExtra("ime1", ime)
            startActivity(intent)
        }
    }
}

