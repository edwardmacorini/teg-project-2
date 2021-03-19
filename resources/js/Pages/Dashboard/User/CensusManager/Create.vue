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
                                <v-row>
                                    <v-col>
                                            
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
    components: {
        UserLayout
    }
};
</script>
