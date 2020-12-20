package ep.rest

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.TextView
import kotlinx.android.synthetic.main.activity_moji_podatki.*

class mojiPodatkiActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_moji_podatki)

        val ali = 1
        val ime = findViewById<TextView>(R.id.upIme)
        val priimek = findViewById<TextView>(R.id.upPriimek)
        val naslov = findViewById<TextView>(R.id.address)
        val mail = findViewById<TextView>(R.id.mail)
        val geslo = findViewById<TextView>(R.id.password)

        val novoIme = ime.text.toString()

        // Nazaj:
        btnBack.setOnClickListener{
            val intent = Intent(this, MainActivity::class.java)
            intent.putExtra("ali2", ali)
            startActivity(intent)
        }

        // Shrani:
        button.setOnClickListener{
            val intent = Intent(this, MainActivity::class.java)
            // Nove vrednosti:
            ime.text = novoIme
            priimek.text = priimek.text.toString()

            intent.putExtra("ali2", ali)
            startActivity(intent)
        }
    }
}