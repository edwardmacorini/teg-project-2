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
                                                Lorem ipsum dolor sit amet,
                                                consectetur adipisicing elit.
                                                Aperiam, iure. Possimus aliquid
                                                quis accusamus amet.
                                            </h1>
                                            <p
                                                class="white--text font-weight-light text-center text-md-left"
                                            >
                                                Lorem ipsum dolor sit amet
                                                consectetur adipisicing elit.
                                                Illum quaerat eveniet temporibus
                                                quis vitae excepturi adipisci
                                                neque eligendi distinctio
                                                obcaecati a, consequatur,
                                                exercitationem vero est fuga
                                                cupiditate eum soluta ipsum.
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
                        <articulos-component></articulos-component>
                    </v-col>
                    <v-col>
                        <articulos-component></articulos-component>
                    </v-col>
                    <v-col>
                        <articulos-component></articulos-component>
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
