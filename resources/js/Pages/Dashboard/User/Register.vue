<template>
    <default-layout>
        <form @submit.prevent="onSubmit()">
            <v-row
                justify="center"
                align-md="center"
                style="min-height: 100vh;"
            >
                <v-col cols="12" sm="10" md="8">
                    <v-stepper v-model="e1" class="elevation-8">
                        <v-card-title>
                            <v-row align="end" class="mb-1">
                                <v-img
                                    src="/assets/logo.jpeg"
                                    max-width="100"
                                ></v-img>
                                Formulario de registro
                            </v-row>
                        </v-card-title>
                        <v-stepper-header>
                            <v-stepper-step :complete="e1 > 1" step="1">
                                Paso 1
                            </v-stepper-step>

                            <v-divider></v-divider>

                            <v-stepper-step :complete="e1 > 2" step="2">
                                Paso 2
                            </v-stepper-step>

                            <v-divider></v-divider>

                            <v-stepper-step :complete="e1 > 3" step="3">
                                Paso 3
                            </v-stepper-step>

                            <v-divider></v-divider>

                            <v-stepper-step :complete="e1 > 4" step="4">
                                Paso 4
                            </v-stepper-step>

                            <v-divider></v-divider>

                            <v-stepper-step step="5">
                                Paso Final
                            </v-stepper-step>
                        </v-stepper-header>

                        <v-stepper-items>
                            <v-stepper-content step="1">
                                <v-card
                                    class="mb-6 mb-md-12"
                                    height="550px"
                                    elevation="0"
                                >
                                    <v-card-text class="px-md-7">
                                        <v-row class="mt-n5">
                                            <v-col>
                                                <v-text-field
                                                    label="Nombres"
                                                    v-model="form.nombres"
                                                    outlined
                                                ></v-text-field>
                                            </v-col>
                                        </v-row>
                                        <v-row class="mt-n5">
                                            <v-col>
                                                <v-text-field
                                                    label="Apellidos"
                                                    v-model="form.apellidos"
                                                    outlined
                                                ></v-text-field>
                                            </v-col>
                                        </v-row>
                                        <v-row class="mt-n5">
                                            <v-col cols="4" md="3">
                                                <v-select
                                                    v-model="form.tipoCedula"
                                                    :items="items_tipoCedula"
                                                    label="Tipo de cedula"
                                                    outlined
                                                ></v-select>
                                            </v-col>
                                            <v-col>
                                                <v-text-field
                                                    label="Nº cedula"
                                                    v-model="form.cedula"
                                                    outlined
                                                ></v-text-field>
                                            </v-col>
                                        </v-row>
                                        <v-row class="mt-n5">
                                            <v-col>
                                                <v-text-field
                                                    label="Nacionalidad"
                                                    v-model="form.nacionalidad"
                                                    outlined
                                                ></v-text-field>
                                            </v-col>
                                        </v-row>
                                        <v-row class="mt-n5">
                                            <v-col>
                                                <v-menu
                                                    ref="menu"
                                                    v-model="menu"
                                                    :close-on-content-click="
                                                        false
                                                    "
                                                    :return-value.sync="
                                                        form.fechaNacimiento
                                                    "
                                                    transition="scale-transition"
                                                    offset-y
                                                    outlined
                                                    min-width="auto"
                                                >
                                                    <template
                                                        v-slot:activator="{
                                                            on,
                                                            attrs
                                                        }"
                                                    >
                                                        <v-text-field
                                                            v-model="
                                                                form.fechaNacimiento
                                                            "
                                                            label="Fecha de nacimiento"
                                                            preapend-icon="mdi-calendar"
                                                            readonly
                                                            outlined
                                                            v-bind="attrs"
                                                            v-on="on"
                                                        ></v-text-field>
                                                    </template>
                                                    <v-date-picker
                                                        v-model="
                                                            form.fechaNacimiento
                                                        "
                                                        no-title
                                                        scrollable
                                                    >
                                                        <v-spacer></v-spacer>
                                                        <v-btn
                                                            text
                                                            color="primary"
                                                            @click="
                                                                menu = false
                                                            "
                                                        >
                                                            Cancelar
                                                        </v-btn>
                                                        <v-btn
                                                            text
                                                            color="primary"
                                                            @click="
                                                                $refs.menu.save(
                                                                    form.fechaNacimiento
                                                                )
                                                            "
                                                        >
                                                            OK
                                                        </v-btn>
                                                    </v-date-picker>
                                                </v-menu>
                                            </v-col>
                                        </v-row>
                                        <v-row class="mt-n5">
                                            <v-col cols="6">
                                                <v-select
                                                    v-model="form.sexo"
                                                    :items="items_sexo"
                                                    label="Sexo"
                                                    outlined
                                                ></v-select>
                                            </v-col>
                                            <v-col>
                                                <v-select
                                                    v-model="form.estadoCivil"
                                                    :items="items_estadoCivil"
                                                    label="Estado Civil"
                                                    outlined
                                                ></v-select>
                                            </v-col>
                                        </v-row>
                                    </v-card-text>
                                </v-card>

                                <v-btn color="primary" @click="e1 = 2">
                                    Continuar
                                </v-btn>
                                <inertia-link
                                    :href="route('ladingpage')"
                                    style="text-decoration: none;"
                                >
                                    <v-btn text>
                                        Cancelar
                                    </v-btn>
                                </inertia-link>
                            </v-stepper-content>

                            <v-stepper-content step="2">
                                <v-card
                                    class="mb-6 mb-md-12"
                                    height="550px"
                                    elevation="0"
                                >
                                    <v-card-text class="px-md-7">
                                        <v-row class="mt-n5">
                                            <v-col>
                                                <v-text-field
                                                    label="Profesión"
                                                    v-model="form.profesion"
                                                    outlined
                                                ></v-text-field>
                                            </v-col>
                                        </v-row>
                                        <v-row class="mt-n5">
                                            <v-col>
                                                <v-text-field
                                                    label="Ocupación"
                                                    v-model="form.ocupacion"
                                                    outlined
                                                ></v-text-field>
                                            </v-col>
                                        </v-row>
                                        <v-row class="mt-n5">
                                            <v-col>
                                                <v-text-field
                                                    label="Nº Familia"
                                                    v-model="form.familia"
                                                    outlined
                                                ></v-text-field>
                                            </v-col>
                                            <v-col>
                                                <v-text-field
                                                    label="Nº Hijos"
                                                    v-model="form.hijos"
                                                    outlined
                                                ></v-text-field>
                                            </v-col>
                                        </v-row>
                                        <v-row class="mt-n5">
                                            <v-col>
                                                <v-select
                                                    v-model="form.tipoVivienda"
                                                    :items="items_tipoVivienda"
                                                    label="Tipo de vivienda"
                                                    outlined
                                                ></v-select>
                                            </v-col>
                                        </v-row>
                                        <v-row class="mt-n5">
                                            <v-col>
                                                <v-select
                                                    v-model="form.propiedad"
                                                    :items="items_propiedad"
                                                    label="Propiedad"
                                                    outlined
                                                ></v-select>
                                            </v-col>
                                        </v-row>
                                        <v-row class="mt-n5">
                                            <v-col>
                                                <v-select
                                                    v-model="
                                                        form.situacionEconomica
                                                    "
                                                    :items="
                                                        items_situacionEconomica
                                                    "
                                                    label="Situación Economica"
                                                    outlined
                                                ></v-select>
                                            </v-col>
                                        </v-row>
                                    </v-card-text>
                                </v-card>

                                <v-btn color="primary" @click="e1 = 3">
                                    Continuar
                                </v-btn>

                                <v-btn text color="red" @click="e1 = 1">
                                    Atras
                                </v-btn>
                            </v-stepper-content>

                            <v-stepper-content step="3">
                                <v-card
                                    class="mb-12"
                                    height="550px"
                                    elevation="0"
                                >
                                    <v-card-text class="px-md-7">
                                        <v-row>
                                            <v-col cols="12">
                                                <p class="mt-md-n3">
                                                    ¿Grupo sanguineo?
                                                </p>
                                                <v-select
                                                    :items="items_tipo_sangre"
                                                    v-model="form.tipo_sangre"
                                                    label="Grupo sanguineo"
                                                    outlined
                                                ></v-select>
                                            </v-col>
                                            <v-col cols="12">
                                                <p class="mt-n3">
                                                    ¿Posee alguna condición
                                                    especíal?
                                                </p>
                                                <v-text-field
                                                    type="text"
                                                    label="Condición especial"
                                                    v-model="
                                                        form.cond_especiales
                                                    "
                                                    outlined
                                                ></v-text-field>
                                            </v-col>
                                            <v-col cols="12">
                                                <p class="mt-n3">
                                                    ¡Si posee antecedentes
                                                    medicos mencionelos de lo
                                                    contrario deje el campo
                                                    vacio!
                                                </p>
                                                <v-text-field
                                                    type="text"
                                                    label="Antecedentes médicos"
                                                    v-model="form.antecedentes"
                                                    outlined
                                                ></v-text-field>
                                            </v-col>
                                        </v-row>
                                        <v-row class="mt-n3">
                                            <v-col
                                                cols="12"
                                                md="5"
                                                class="my-n5 my-md-0"
                                            >
                                                <v-radio-group
                                                    v-model="
                                                        form.isDiscapacitado
                                                    "
                                                    row
                                                >
                                                    <template v-slot:label>
                                                        <div>
                                                            ¿Es discapacitado?
                                                        </div>
                                                    </template>
                                                    <v-radio
                                                        label="Si"
                                                        value="1"
                                                    ></v-radio>
                                                    <v-radio
                                                        label="No"
                                                        value="0"
                                                    ></v-radio>
                                                </v-radio-group>
                                            </v-col>
                                            <v-col cols="12" md="7">
                                                <v-text-field
                                                    :disabled="
                                                        form.isDiscapacitado !=
                                                        1
                                                            ? true
                                                            : false
                                                    "
                                                    type="text"
                                                    label="¿Que discapacidad posee?"
                                                    v-model="
                                                        form.descripcionIsDiscapacitado
                                                    "
                                                    outlined
                                                ></v-text-field>
                                            </v-col>
                                        </v-row>
                                    </v-card-text>
                                </v-card>

                                <v-btn color="primary" @click="e1 = 4">
                                    Continuar
                                </v-btn>

                                <v-btn text color="red" @click="e1 = 2">
                                    Atras
                                </v-btn>
                            </v-stepper-content>

                            <v-stepper-content step="4">
                                <v-card
                                    class="mb-10 mb-md-12 pt-15"
                                    height="550px"
                                    elevation="0"
                                >
                                    <v-card-text class="px-md-7">
                                        <v-row>
                                            <v-text-field
                                                outlined
                                                v-model="form.username"
                                                label="Nombre de usuario"
                                                prepend-icon="mdi-account"
                                            ></v-text-field>
                                        </v-row>
                                        <v-row>
                                            <v-text-field
                                                outlined
                                                v-model="form.email"
                                                label="Correo"
                                                prepend-icon="mdi-email"
                                            ></v-text-field>
                                        </v-row>
                                        <v-row>
                                            <v-text-field
                                                outlined
                                                v-model="form.phone"
                                                label="Numero de telefono"
                                                prepend-icon="mdi-phone"
                                            ></v-text-field>
                                        </v-row>
                                        <v-row>
                                            <v-text-field
                                                outlined
                                                v-model="form.password"
                                                :append-icon="
                                                    show1
                                                        ? 'mdi-eye'
                                                        : 'mdi-eye-off'
                                                "
                                                :type="
                                                    show1 ? 'text' : 'password'
                                                "
                                                @click:append="show1 = !show1"
                                                label="Contraseña"
                                                prepend-icon="mdi-lock"
                                            ></v-text-field>
                                        </v-row>
                                        <v-row>
                                            <v-text-field
                                                outlined
                                                v-model="
                                                    form.password_confirmation
                                                "
                                                :append-icon="
                                                    show2
                                                        ? 'mdi-eye'
                                                        : 'mdi-eye-off'
                                                "
                                                :type="
                                                    show2 ? 'text' : 'password'
                                                "
                                                @click:append="show2 = !show2"
                                                label="Confirmar contraseña"
                                                prepend-icon="mdi-lock"
                                            ></v-text-field>
                                        </v-row>
                                    </v-card-text>
                                </v-card>

                                <v-btn color="primary" @click="e1 = 5">
                                    Continuar
                                </v-btn>

                                <v-btn text color="red" @click="e1 = 3">
                                    Atras
                                </v-btn>
                            </v-stepper-content>

                            <v-stepper-content step="5">
                                <v-card
                                    class="mb-10 mb-md-12"
                                    height="550px"
                                    elevation="0"
                                >
                                    <v-card-text class="px-md-7">
                                        <v-row class="mt-n3">
                                            <v-col>
                                                <v-alert
                                                    dense
                                                    type="warning"
                                                    :value="true"
                                                    class="text-justify"
                                                >
                                                    Es importante utilizar la
                                                    dirección actual debido a
                                                    que esta información se
                                                    utilizara para poder
                                                    enviarle los insumos
                                                    médicos.
                                                </v-alert>
                                            </v-col>
                                        </v-row>
                                        <v-row class="mt-n3">
                                            <v-col>
                                                <v-text-field
                                                    type="text"
                                                    label="Avenida"
                                                    v-model="form.avenida"
                                                    outlined
                                                ></v-text-field>
                                            </v-col>
                                        </v-row>
                                        <v-row class="mt-n5">
                                            <v-col>
                                                <v-text-field
                                                    type="text"
                                                    label="Sector"
                                                    v-model="form.sector"
                                                    outlined
                                                ></v-text-field>
                                            </v-col>
                                            <v-col>
                                                <v-text-field
                                                    type="text"
                                                    label="Estado"
                                                    v-model="form.estado"
                                                    outlined
                                                ></v-text-field>
                                            </v-col>
                                        </v-row>
                                        <v-row class="mt-n5">
                                            <v-col>
                                                <v-text-field
                                                    type="text"
                                                    label="Municipio"
                                                    v-model="form.municipio"
                                                    outlined
                                                ></v-text-field>
                                            </v-col>
                                            <v-col>
                                                <v-text-field
                                                    type="text"
                                                    label="Parroquia"
                                                    v-model="form.parroquia"
                                                    outlined
                                                ></v-text-field>
                                            </v-col>
                                        </v-row>
                                        <v-row class="mt-n5">
                                            <v-col>
                                                <v-text-field
                                                    type="text"
                                                    label="Ciudad"
                                                    v-model="form.ciudad"
                                                    outlined
                                                ></v-text-field>
                                            </v-col>
                                            <v-col>
                                                <v-text-field
                                                    type="text"
                                                    label="Zona Postal"
                                                    v-model="form.zonaPostal"
                                                    outlined
                                                ></v-text-field>
                                            </v-col>
                                        </v-row>
                                        <v-row class="mt-n5">
                                            <v-col>
                                                <v-text-field
                                                    type="text"
                                                    label="Punto de referencia"
                                                    v-model="form.referencia"
                                                    outlined
                                                ></v-text-field>
                                            </v-col>
                                        </v-row>
                                    </v-card-text>
                                </v-card>

                                <v-btn color="success" type="submit">
                                    Completar Formulario
                                </v-btn>

                                <v-btn text color="red" @click="e1 = 4">
                                    Atras
                                </v-btn>
                            </v-stepper-content>
                        </v-stepper-items>
                    </v-stepper>
                </v-col>
            </v-row>
        </form>
        {{ errors }}
    </default-layout>
</template>

<script>
import DefaultLayout from "../../../Layouts/DefaultLayout";
export default {
    props: {
        estadoCivil: Array,
        tipoVivienda: Array,
        propiedad: Array,
        situacionEconomica: Array,
        tipo_sangre: Array,
        errors: Object
    },
    components: {
        DefaultLayout
    },
    data() {
        return {
            show1: false,
            show2: false,
            items_tipoCedula: ["V", "E"],
            items_sexo: ["Masculino", "Femenino"],
            items_tipoVivienda: [],
            items_situacionEconomica: [],
            items_estadoCivil: [],
            items_tipo_sangre: [],
            items_propiedad: [],
            menu: false,
            e1: 1,
            form: this.$inertia.form({
                nombres: null,
                apellidos: null,
                tipoCedula: "V",
                cedula: null,
                fechaNacimiento: null,
                nacionalidad: null,
                sexo: "Masculino",
                estadoCivil: null,
                profesion: null,
                ocupacion: null,
                familia: null,
                hijos: null,
                tipoVivienda: null,
                propiedad: null,
                situacionEconomica: null,
                tipo_sangre: null,
                cond_especiales: null,
                antecedentes: null,
                isDiscapacitado: 0,
                descripcionIsDiscapacitado: null,
                avenida: null,
                sector: null,
                estado: null,
                municipio: null,
                parroquia: null,
                ciudad: null,
                zonaPostal: null,
                referencia: null,
                username: null,
                email: null,
                phone: null,
                password: null,
                password_confirmation: null
            })
        };
    },
    watch: {
        errors(errors) {
            if (errors) {
                this.$swal.fire({
                    icon: "error",
                    title: "Hubo un error",
                    text: "Por favor corrija la información"
                });
            }
        }
    },
    mounted: function() {
        this.tipoVivienda.forEach(el =>
            this.items_tipoVivienda.push(el.nombre)
        );
        this.estadoCivil.forEach(el => this.items_estadoCivil.push(el.nombre));
        this.propiedad.forEach(el => this.items_propiedad.push(el.nombre));
        this.tipo_sangre.forEach(el => this.items_tipo_sangre.push(el.nombre));
        this.situacionEconomica.forEach(el =>
            this.items_situacionEconomica.push(el.nombre)
        );
    },
    methods: {
        onSubmit() {
            this.form.post(this.route("user-register-store"), {
                onFinish: () =>
                    this.form.reset("password", "password_confirmation")
            });
        }
    }
};
</script>

<style scoped>
.card-user-register {
    max-width: 750px;
    padding: 0;
}

.card-user-stepper {
    min-height: 400px;
    max-height: 400px;
    height: 400px;
}
.line-shadow {
    min-width: 100%;
    max-height: 1.5px;
    height: 1.5px;
    min-height: 1.5px;
    background: rgb(10, 161, 17);
    box-shadow: 1px 2px 5px 0.5px rgb(10, 161, 17);
}
</style>
