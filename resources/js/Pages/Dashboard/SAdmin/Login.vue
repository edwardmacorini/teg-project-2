<template>
    <form @submit.prevent="submit">
        <template>
            <validation-errors class="mb-4" />
            <default-layout>
                <v-container>
                    <v-row justify="center" align="center" class="wh-100">
                        <v-col cols="12" sm="9" md="6">
                            <v-card elevation="2" class="px-5 py-10">
                                <v-card-title>
                                    <h5 class="headline text--secondary">
                                        <v-btn icon color="primary">
                                            <v-icon>mdi-arrow-left-circle</v-icon>
                                        </v-btn>
                                        Iniciar Sesión
                                    </h5>
                                </v-card-title>
                                <v-card-text>
                                  <v-row>
                                    <v-text-field
                                      v-model="form.username"
                                      label="Nombre de usuario"
                                      name="username"
                                    ></v-text-field>
                                  </v-row>
                                  <v-row>
                                    <v-text-field
                                      v-model="form.password"
                                      name="password"
                                      label="Contraseña"
                                    ></v-text-field>
                                  </v-row>
                                  <v-row justify="center" class="mt-10">
                                    <v-btn 
                                      type="submit"
                                      block
                                      color="primary"
                                      >
                                        Iniciar Sesión
                                      </v-btn>
                                  </v-row>
                                </v-card-text>

                            </v-card>
                        </v-col>
                    </v-row>
                </v-container>
            </default-layout>
        </template>
    </form>
</template>

<script>
import ValidationErrors from "../../../Jetstream/ValidationErrors.vue";
import DefaultLayout from "../../../Layouts/DefaultLayout.vue";

export default {
    components: {
        DefaultLayout,
        ValidationErrors
    },
    data() {
      return {
        form: this.$inertia.form({
          username: '',
          password: ''
        })
      }
    },
    methods: {
      submit() {
        this.form.post(this.route("login"), {
          onFinish: () =>
            this.form.reset("password")
        });
      }
    }
};
</script>
