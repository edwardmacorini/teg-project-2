<template>
    <user-layout :userData="userData">
        <v-row justify="center" align="center">
            <v-col cols="9">
                <v-card elevation="8" class="mt-5 px-5 py-10 radio">
                    <h2>Listado de censos</h2>
                    <v-row justify="space-between" align="center" class="mt-1">
                        <v-col></v-col>
                        <v-col cols="auto">
                            <inertia-link
                                :href="route('user-create')"
                                class="txnode"
                            >
                                <v-btn
                                    outlined
                                    color="blue darken-3"
                                    class="mr-5"
                                >
                                    Censarse para recibir insumos medicos
                                </v-btn>
                            </inertia-link>
                        </v-col>
                    </v-row>
                    <v-data-table
                        :headers="headers"
                        :items="items"
                        :items-per-page="5"
                        class="elavation-1 mt-5"
                    >
                        <template v-slot:item.resumen="{ item }">
                            <v-btn class="" color="green" dark>
                                <v-icon dark>mdi-archive-arrow-up</v-icon>
                            </v-btn>
                        </template>
                        <template v-slot:item.created_at="{ item }">
                                {{ item.created_at.substr(0,10) }}...
                        </template>
                        <template v-slot:no-data>
                            No poseé ningún censo
                        </template>
                    </v-data-table>
                </v-card>
            </v-col>
        </v-row>
    </user-layout>
</template>

<script>
import UserLayout from "../../../../Layouts/UserLayout";

export default {
    props: {
        userData: Object,
        census: Array,
        products: Array
    },
    components: {
        UserLayout
    },
    data() {
        return {
            headers: [
                {
                    text: "Fecha del censo",
                    align: "center",
                    sortable: true,
                    value: "created_at"
                },
                {
                    text: "Descripción",
                    align: "center",
                    sortable: true,
                    value: "descripcion"
                },
                {
                    text: "Estado",
                    align: "center",
                    sortable: true,
                    value: "estado"
                },
                {
                    text: "Resumen",
                    align: "center",
                    sortable: true,
                    value: "resumen"
                }
            ],
            items: []
        };
    },
    mounted: function() {
        this.census.forEach(element => {
            this.items.push({
                created_at: element.created_at,
                descripcion: element.descripcion,
                estado: element.estado,
                resumen: element.id
            });
        });
    }
};
</script>
