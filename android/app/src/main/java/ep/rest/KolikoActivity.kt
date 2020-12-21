package ep.rest

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.TextView
import kotlinx.android.synthetic.main.activity_koliko2.*
import kotlinx.android.synthetic.main.activity_kosarica.*
import kotlinx.android.synthetic.main.activity_kosarica.btnNazaj2

class KolikoActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_koliko2)

        val izdelek = findViewById<TextView>(R.id.izdelek)
        val koliko = findViewById<TextView>(R.id.koliko)
        val skupna = findViewById<TextView>(R.id.cena1)

        val prvi = 1

        val cena = intent.getDoubleExtra("cena1", 0.0)
        val kateri = intent.getStringExtra("ime1")

        izdelek.text = kateri

        // Nazaj
        btnNazaj3.setOnClickListener{
            val intent = Intent(this, MainActivity::class.java)
            startActivity(intent)
        }

        // Izračun cene:
        btnCena.setOnClickListener{
            val prvi = koliko.text.toString()
            val int: Int? = prvi.toInt()
            if (int != null) {
                val dobimo = izracunaj(int, cena)
                skupna.text = dobimo.toString() + " EUR"
            }
        }

        // Nadaljujemo:
        btnNadaljuj.setOnClickListener{
            val prvi1 = koliko.text.toString()
            val int: Int? = prvi1.toInt()
            val dobimo = int?.let { izracunaj(it, cena) }
            val intent = Intent(this, KosaricaActivity::class.java)
            intent.putExtra("ime3", kateri)
            intent.putExtra("skupna", dobimo)
            intent.putExtra("stevilo", int)
            startActivity(intent)
        }
    }

    private fun izracunaj(stevilo: Int, cena: Double): Double {
        val skupno = cena * stevilo
        return skupno
    }

}