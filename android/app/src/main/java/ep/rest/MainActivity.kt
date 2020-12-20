package ep.rest

import android.content.Intent
import android.os.Bundle
import android.util.Log
import android.widget.AdapterView
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import kotlinx.android.synthetic.main.activity_main.*
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import java.io.IOException

class MainActivity : AppCompatActivity(), Callback<List<Izdelek>> {
    private val tag = this::class.java.canonicalName

    private lateinit var adapter: IzdelekAdapter

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        adapter = IzdelekAdapter(this)
        items.adapter = adapter
        items.onItemClickListener = AdapterView.OnItemClickListener { _, _, i, _ ->
            val podatek = adapter.getItem(i)
            if( podatek != null){
                val intent = Intent(this, prviIzdelek::class.java)
                intent.putExtra("opis", podatek.opis)
                intent.putExtra("naslov", podatek.ime)
                intent.putExtra("price", podatek.price)
                startActivity(intent)
            }
        }

        // Prijava:
        btnPrijava.setOnClickListener{
            val intent = Intent(this, prijavaActivity::class.java)
            startActivity(intent)
        }
        // Prijavi se:
        val prijava = "Prijavi se"
        btnPrijava.text = prijava

        // Moj profil:
        btnPodatki.isEnabled = false
        btnPodatki.setOnClickListener{
            val intent = Intent(this, mojiPodatkiActivity::class.java)
            startActivity(intent)
        }

        container.setOnRefreshListener { IzdelekService.instance.getAll().enqueue(this) }

        IzdelekService.instance.getAll().enqueue(this)
    }

    override fun onResponse(call: Call<List<Izdelek>>, response: Response<List<Izdelek>>) {
        if (response.isSuccessful) {
            val hits = response.body() ?: emptyList()
            Log.i(tag, "Got ${hits.size} hits")
            adapter.clear()
            adapter.addAll(hits)
        } else {
            val errorMessage = try {
                "An error occurred: ${response.errorBody()?.string()}"
            } catch (e: IOException) {
                "An error occurred: error while decoding the error message."
            }

            Toast.makeText(this, errorMessage, Toast.LENGTH_SHORT).show()
            Log.e(tag, errorMessage)
        }
        container.isRefreshing = false

        // Gumb prijava/odjava
        val novi2 = "Odjavi se"
        val ali = intent.getIntExtra("ali", 0)
        val ali2 = intent.getIntExtra("ali2", 0)
        if( ali == 1 || ali2 == 1) {
            btnPrijava.text = novi2
            btnPodatki.isEnabled = true
        }
    }

    override fun onFailure(call: Call<List<Izdelek>>, t: Throwable) {
        Log.w(tag, "Error: ${t.message}", t)
        container.isRefreshing = false
    }
}
