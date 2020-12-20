package ep.rest

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.TextView
import kotlinx.android.synthetic.main.activity_main.*
import kotlinx.android.synthetic.main.activity_prijava.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response


class prijavaActivity : AppCompatActivity() {

    var counter = 3
    val odj = "Odjavi se"
    val ali = 1

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_prijava)

        val uporabnik = findViewById<TextView>(R.id.ime)
        val geslo = findViewById<TextView>(R.id.geslo)
        val info = findViewById<TextView>(R.id.poskusi)

        btnLogin.setOnClickListener{
            validate(uporabnik.text.toString(), geslo.text.toString())
        }
    }

    private fun validate(userName: String, userPassword: String){
        if((userName == "admin") && (userPassword == "123")) {
            val intent = Intent(this, MainActivity::class.java)
            intent.putExtra("odjava", odj)
            intent.putExtra("ali", ali)
            startActivity(intent)
        }
        else{
            counter--
            //info.text = "Na voljo je še toliko poskusov: " + counter
            if(counter == 0) {
                btnLogin.isEnabled = false
            }
        }
    }
}

