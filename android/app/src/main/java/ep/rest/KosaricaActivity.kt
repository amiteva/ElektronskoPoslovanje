package ep.rest

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.os.TestLooperManager
import android.widget.TextView
import kotlinx.android.synthetic.main.activity_kosarica.*

class KosaricaActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_kosarica)

        val cena = intent.getDoubleExtra("skupna", 0.0)
        val kateri = intent.getStringExtra("ime3")
        val koliko = intent.getIntExtra("stevilo", 0)

        val vse = findViewById<TextView>(R.id.vse)
        val nova = cena + 5

        vse.text = "Naročate " + kateri + ". Število izdelkov, ki ste jih naročili je " + koliko + ". Skupna cena znaša " + cena + "EUR. Cena s stroški dostave ( 5 EUR ) pa " + nova + " EUR."

        // Kupi:
        btnKupi.setOnClickListener{
            val intent = Intent(this, zakljucekActivity::class.java)
            startActivity(intent)
        }

        // Nazaj:
        btnNazaj2.setOnClickListener{
            val intent = Intent(this, MainActivity::class.java)
            startActivity(intent)
        }
    }
}