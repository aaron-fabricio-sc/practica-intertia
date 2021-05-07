<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Módulo de notas
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg text-gray-900">
                                  EDtiar una nota
                                </h3>
                                <p class="text-sm text-gray-900 font-bold">
                                SI EDITAS NO PODRAS RECUPERARLO
                                </p>
                                
                            </div>
                        </div>
                        <div class="md:col-span-2 mt-5 md:mt-0">
                            <div class="shadow bg-white md:rounded-md p-4">
                               <form @submit.prevent="submit">
                                   <label for="" class="block font-medium text-sm text-gray-700">Resumen</label>
                                   <textarea class="form-input w-full rounded-md shadow-sm" v-model="form.excerpt" cols="30" rows="10"></textarea>

                                    <label for="" class="block font-medium text-sm text-gray-700">Contenido</label>
                                   <textarea class="form-input w-full rounded-md shadow-sm" v-model="form.content" cols="30" rows="10"></textarea>

                                   <button type="" class="bg-blue-600 text-white font-bold py-3 px-4">Editar</button>
                               </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Welcome from "@/Jetstream/Welcome";

export default {
    components: {
        AppLayout,
    },
    props:{
        nota:Object,
        },
    data(){
        return{
            form:{
                excerpt : this.nota.excerpt,
                content : this.nota.content,

            }
            }

        },
    methods:{
        submit(){
            this.$inertia.put(this.route('notas.update',this.nota.id),this.form)
        }
    }
    
};
</script>
