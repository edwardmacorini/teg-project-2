<template>
    <default-layout>
        <header>
            <v-container>
                <v-row class="mt-md-3">
                    <v-card style="max-height: 550px;">
                        <v-img
                            src="/assets/help-health.jpg"
                            style="max-height: 550px;"
                        >
                            <v-row justify-md="end" class="mt-md-15 mr-5">
                                <v-col cols="12" md="7">
                                    <v-row
                                        justify="center"
                                        align="center"
                                        class="mt-3 mt-md-15"
                                    >
                                        <v-col cols="auto">
                                            <v-img
                                                style="border-radius:15px;"
                                                src="/assets/logo.jpeg"
                                                width="150px"
                                                class="elevation-8"
                                            ></v-img>
                                        </v-col>
                                        <v-col cols="12" md="8">
                                            <h1
                                                class="white--text tx-titulo text-center text-md-left"
                                            >
                                                ¡Somos la ayuda que tu necesitas! 
                                            </h1>
                                            <p
                                                class="white--text font-weight-light text-center text-md-left"
                                            >
                                                Nosotros ayudamos a los pacientes que padecen de enfermedades cronicas permitiendoles gestionar sus censos desde la comodidad de su hogar. Si eres una persona que padece de algun tipo de enfermedad cronica no dudes en registrarte para recibir tu censo.
                                            </p>
                                        </v-col>
                                    </v-row>
                                </v-col>
                            </v-row>
                            <v-row justify-md="end" align="center">
                                <v-col
                                    cols="12"
                                    md="4"
                                    class="text-center mb-5"
                                >
                                    <inertia-link
                                        :href="route('user-register')"
                                        style="text-decoration: none;"
                                    >
                                        <v-btn
                                            outlined
                                            color="white"
                                            class="mt-md-n3 mr-2"
                                        >
                                            Registrarse
                                        </v-btn>
                                    </inertia-link>
                                    <inertia-link
                                        :href="route('user-login')"
                                        style="text-decoration: none;"
                                    >
                                        <v-btn class="mt-md-3"
                                            >Iniciar Sesión</v-btn
                                        >
                                    </inertia-link>
                                </v-col>
                            </v-row>
                        </v-img>
                    </v-card>
                </v-row>
            </v-container>
        </header>
        <main>
            <v-container>
                <v-row>
                    <v-col>
                        <articulos-component
                            url="https://i1.wp.com/ultimasnoticias.com.ve/wp-content/uploads/2021/03/AstraZeneca-FOTO-EFE.jpg?w=768&ssl=1"
                            title="Ministerio de sanidad propone  retomar la vacunación"
                            parr="El Ministerio de Sanidad propone retomar la vacunación con el fármaco de AstraZeneca el miércoles de la semana que viene. Así lo ha decidido tras el anuncio de la Agencia Europea de Medicamentos (EMA) de que la vacuna sigue teniendo más beneficios que riesgos. La directora ejecutiva de la EMA, Emer Cooke, ha informado de que el comité de expertos que ha evaluado los casos de trombosis que se han producido en algunas personas después de ser vacunadas ha concluido que la vacuna es “segura y eficaz”."
                            link="https://www.msn.com/es-es/deportes/futbol/c3-baltimas-noticias-del-coronavirus-en-directo-la-federaci-c3-b3n-anuncia-que-no-habr-c3-a1-p-c3-bablico-en-la-final-de-la-copa-del-rey-entre-el-athletic-y-la-real/ar-BB1eIx1v"
                        ></articulos-component>
                    </v-col>
                    <v-col>
                        <articulos-component
                            url="https://i1.wp.com/ultimasnoticias.com.ve/wp-content/uploads/2020/03/Covid-19.jpg?w=768&ssl=1"
                            title="Un año se ha cumplido desde la confirmación del primer caso en el país."
                            parr="Se cumple un año de la llegada de los primeros casos de covid-19 a Venezuela, historia que comenzó con todos los pronósticos en contra dada la agresividad del virus y la situación país como consecuencia de tres años convulsos que tuvieron su génesis con la llegada de Donald Trump a la presidencia de los Estados Unidos."
                            link="https://ultimasnoticias.com.ve/noticias/mas-vida/covid-19-en-venezuela-la-bomba-que-nunca-estallo/"
                        ></articulos-component>
                    </v-col>
                    <v-col>
                        <articulos-component
                            url="https://e00-elmundo.uecdn.es/assets/multimedia/imagenes/2021/03/17/16159875787599.gif"
                            title="Guía para interpretar tu test Covid"
                            parr=""
                            link="https://www.elmundo.es/ciencia-y-salud/salud/2021/03/18/6049fcb221efa09d6d8b4616.html"
                        ></articulos-component>
                    </v-col>
                    <v-col>
                        <articulos-component
                            url="https://phantom-elmundo.unidadeditorial.es/440b931009df239a52008f54e1a9508c/crop/0x0/1023x682/resize/473/f/webp/assets/multimedia/imagenes/2021/03/16/16159114666234.jpg"
                            title="La pandemia ha acabado con la vida de 112 médicos"
                            parr="La labor y compromiso de estas 112 personas y mandar el mayor de los abrazos a sus familias. De igual manera queremos que este recuerdo y cariño vaya también a los cientos de compañeros que aún siguen luchando con las complicaciones de esta enfermedad y por los miles que están dando lo mejor de esta profesión en estos momentos. Se lo debemos a los que ya no están con nosotros"
                            link="https://www.elmundo.es/ciencia-y-salud/salud/2021/03/18/60533c57fc6c8365118b4590.html"
                        ></articulos-component>
                    </v-col>
                </v-row>
            </v-container>
        </main>
    </default-layout>
</template>

<script>
import DefaultLayout from "../Layouts/DefaultLayout";
import ArticulosComponent from "../Components/ArticulosComponent";

export default {
    components: {
        DefaultLayout,
        ArticulosComponent
    }
};
</script>

<style scoped>
.tx-titulo {
    line-height: 35px;
}
</style>
