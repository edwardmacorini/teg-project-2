<template>
    <admin-layout
        :userData="userData"
        rolName="Administrador"
        :teamData="teamData"
    >
        <form @submit.prevent="submit()" class="px-5">
            <v-card elevation="8" class="mx-15 mt-10 px-15 py-10 radio">
                <v-card-text>
                    <v-row justify="space-between" align="center" class="mb-6">
                        <h2 class="black--text">
                            Crear nuevo producto
                        </h2>
                    </v-row>
                    <v-row>
                        <v-text-field
                            label="Nombre"
                            v-model="form.name"
                        ></v-text-field>
                    </v-row>
                    <v-row>
                        <v-select
                            :items="items_unit"
                            v-model="form.unit"
                            label="Unidad del medicamento"
                        ></v-select>
                    </v-row>
                    <v-row>
                        <v-textarea
                            label="Descripción"
                            v-model="form.descripcion"
                        ></v-textarea>
                    </v-row>
                </v-card-text>
                <v-card-actions>
                    <v-btn color="red darken-1" outlined>
                        Cancelar
                    </v-btn>
                    <v-btn
                        color="primary"
                        outlined
                        type="submit"
                    >
                        Completar
                    </v-btn>
                </v-card-actions>
            </v-card>
        </form>
        {{ errors }}
    </admin-layout>
</template>
<script>
import AdminLayout from "../../../../Layouts/AdminLayout";

export default {
    props: {
        userData: Object,
        teamData: Object,
        errors: Object
    },
    components: {
        AdminLayout
    },
    data() {
        return {
            items_unit: [
                'g',
                'mg',
                'mcg',
                'kg',
                'ml'
            ],
            form: this.$inertia.form({
                name: null,
                unit: null,
                descripcion: null
            }),
            dialog2: false
        };
    },
    methods: {
        submit() {
            this.form.post(this.route("admin-products-store"));
        }
    }
};
</script>
