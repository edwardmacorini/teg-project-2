<template>
    <user-layout :userData="userData">
        <v-row justify="center" align="center" class="mt-5">
            <v-col cols="8">
                <v-card elevation="8">
                    <v-card-title class="">
                        <inertia-link
                            :href="route('user-index')"
                            class="txnode"
                        >
                            <v-icon color="primary" class="mr-2">
                                mdi-arrow-left-circle
                            </v-icon>
                        </inertia-link>

                        Formulario para nuevo registro de censo
                    </v-card-title>
                    <v-divider></v-divider>
                    <v-card-text>
                        <form @submit.prevent="submit()">
                            <v-card-text>
                                <v-row justify="center">
                                    <v-col cols="auto">
                                        <v-img
                                            src="/assets/logo.png"
                                            style="width: 200px;"
                                        ></v-img>
                                    </v-col>
                                </v-row>
                                <v-row justify="center">
                                    <v-col cols="12" md="6">
                                        <v-btn
                                            :loading="loading"
                                            :disabled="loading"
                                            block
                                            :color="form.recipe != null ? 'success':'info'"
                                            class="ma-2 white--text"
                                            @click="$refs.file.click()"
                                        >
                                            <span v-if="form.recipe == null">
                                                Recipe médico
                                                <v-icon right dark>
                                                    mdi-cloud-upload
                                                </v-icon>
                                            </span>
                                            <span v-if="form.recipe != null">
                                                Archivo cargado
                                                <v-icon right dark>
                                                    mdi-check
                                                </v-icon>
                                            </span>
                                        </v-btn>
                                        <input
                                            @change="previewFiles"
                                            type="file"
                                            ref="file"
                                            style="display: none"
                                        />
                                    </v-col>
                                </v-row>
                                <v-row>
                                    <v-col>
                                        <v-text-field
                                            type="text"
                                            label="Razon por la cual realiza el censo"
                                            v-model="form.descripcion"
                                            color
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                                <v-row align="center" justify="center">
                                    <v-col>
                                        <v-select
                                            v-model="product"
                                            :items="item_products"
                                            label="SELECIONAR INSUMO REQUERIDO"
                                        ></v-select>
                                    </v-col>
                                    <v-col
                                        cols="12"
                                        md="auto"
                                        class="text-center"
                                    >
                                        <v-btn
                                            color="primary"
                                            @click="agregar(product)"
                                            >Agregar</v-btn
                                        >
                                    </v-col>
                                </v-row>
                                <v-row>
                                    <ul>
                                        <li
                                            v-for="(pro,
                                            index) in form.products"
                                            :key="index"
                                        >
                                            <span class="text-capitalize">{{
                                                pro
                                            }}</span>
                                            <v-btn
                                                text
                                                color="red"
                                                @click="quitar(pro, index)"
                                                >Quitar</v-btn
                                            >
                                        </li>
                                    </ul>
                                </v-row>
                                <v-row justify="center">
                                    <v-col cols="auto"
                                        ><v-btn color="success"
                                            type="submit"
                                            >Confirmar</v-btn
                                        ></v-col
                                    >
                                </v-row>
                            </v-card-text>
                        </form>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
        {{ errors }}
    </user-layout>
</template>

<script>
import UserLayout from "../../../../Layouts/UserLayout";

export default {
    props: {
        userData: Object,
        products: Array,
        errors: Object
    },
    components: {
        UserLayout
    },
    data() {
        return {
            loader: null,
            loading: false,
            item_products: [],
            product: null,
            form: this.$inertia.form({
                recipe: null,
                products: [],
                descripcion: null
            })
        };
    },
    mounted() {
        this.products.forEach(element => this.item_products.push(element.name));
    },
    watch: {
        loader() {
            const l = this.loader;
            this[l] = !this[l];

            setTimeout(() => (this[l] = false), 3000);

            this.loader = null;
        }
    },
    methods: {
        agregar(item) {
            this.form.products.push(item);
        },
        quitar(item, index) {
            this.form.products.splice(index, 1);
        },
        previewFiles(event) {
            this.loader = "loading";
            console.log(event.target.files);
            this.form.recipe = event.target.files;
        },
        submit() {
            this.form.post(this.route("user-create-store"));
        }
    }
};
</script>
