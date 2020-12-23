package ep.rest

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.EditText
import android.widget.TextView
import kotlinx.android.synthetic.main.activity_moji_podatki.*

class mojiPodatkiActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_moji_podatki)

        val ali = 1
        val ime = findViewById<EditText>(R.id.upIme)
        val priimek = findViewById<TextView>(R.id.upPriimek)
        val naslov = findViewById<TextView>(R.id.address)
        val mail = findViewById<TextView>(R.id.mail)

        val imeN = findViewById<TextView>(R.id.textView4)
        val priimekN = findViewById<TextView>(R.id.textView5)
        val naslovN = findViewById<TextView>(R.id.textView6)
        val mailN = findViewById<TextView>(R.id.textView7)


        // Nazaj:
        btnBack.setOnClickListener{
            val intent = Intent(this, MainActivity::class.java)
            intent.putExtra("ali2", ali)
            startActivity(intent)
        }

        // Shrani:
        button.setOnClickListener{
            //val intent = Intent(this, MainActivity::class.java)
            // Nove vrednosti:
            imeN.text = ime.text.toString()
            priimekN.text = priimek.text.toString()
            naslovN.text = naslov.text.toString()
            mailN.text = mail.text.toString()

            intent.putExtra("ali2", ali)
            //startActivity(intent)
        }
    }
}