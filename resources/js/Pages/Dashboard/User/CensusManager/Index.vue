<template>
    <user-layout>
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
                        <template v-slot:item.type="{ item }">
                            <span v-if="item.type">Organización</span>
                            <span v-else>Farmacia</span>
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
                    text: "Institución",
                    align: "center",
                    sortable: true,
                    value: "institucion"
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
    }
};
</script>
