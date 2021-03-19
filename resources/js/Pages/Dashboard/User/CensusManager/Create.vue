<template>
    <user-layout>
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
                        <form>
                            <v-card-text>
                                <v-row justify="center">
                                    <v-col cols="auto">
                                        <v-img
                                            v-if="form.recipe == null"
                                            src="/assets/logo.png"
                                            style="width: 200px;"
                                        ></v-img>
                                        <v-img
                                            v-if="!form.recipe == null"
                                            :src="recipe"
                                            style="width: 200px;"
                                        ></v-img>
                                    </v-col>
                                </v-row>
                                <v-row justify="center">
                                    <input
                                        @change="loader = 'loading'"
                                        type="file"
                                        ref="file"
                                        style="display: none"
                                    />
                                    <v-col cols="6">
                                        <v-btn
                                            :loading="loading"
                                            :disabled="loading"
                                            block
                                            color="info"
                                            class="ma-2 white--text"
                                            @click="$refs.file.click()"
                                        >
                                            Cargar recipe médico
                                            <v-icon right dark>
                                                mdi-cloud-upload
                                            </v-icon>
                                        </v-btn>
                                    </v-col>
                                </v-row>
                                <v-row>
                                    <v-col>
                                        <v-select
                                            v-model="products"
                                            :items="item_products"
                                            label="SELECIONAR INSUMO REQUERIDO"
                                        ></v-select>
                                    </v-col>
                                </v-row>
                            </v-card-text>
                        </form>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </user-layout>
</template>

<script>
import UserLayout from "../../../../Layouts/UserLayout";

export default {
    props: {
        products: Array
    },
    components: {
        UserLayout
    },
    data() {
        return {
            loader: null,
            loading: false,
            item_products: [],
            form: {
                recipe: null,
                products: []
            }
        };
    },
    watch: {
        loader() {
            const l = this.loader;
            this[l] = !this[l];

            setTimeout(() => (this[l] = false), 3000);

            this.loader = null; 
        }
    }
};
</script>
