package ep.rest

import retrofit2.Call
import retrofit2.Retrofit
import retrofit2.converter.gson.GsonConverterFactory
import retrofit2.http.*

object IzdelekService {

    interface RestApi {

        companion object {
            // AVD emulator
            const val URL = "http://10.0.2.2:8080/netbeans/TRGOVINA/"
        }

        @GET("podatki.php")
        fun getAll(): Call<List<Izdelek>>

        @GET("uporabnik.php")
        fun getUPR(): Call<Uporabnik>

        @POST("uporabnik.php")
        fun update(@Field("ime") ime: String,
                   @Field("priimek") priimek: String,
                   @Field("naslov") naslov: String,
                   @Field("geslo") geslo: String,
                   @Field("mail") mail: String
                    ) : Call<Void>

    }

    val instance: RestApi by lazy {
        val retrofit = Retrofit.Builder()
                .baseUrl(RestApi.URL)
                .addConverterFactory(GsonConverterFactory.create())
                .build()

        retrofit.create(RestApi::class.java)
    }
}
