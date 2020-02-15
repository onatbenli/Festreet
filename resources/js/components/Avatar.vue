<template>
    <div>
        <!-- Note that 'ref' is important here (value can be anything). read the description about `ref` below. -->
        <vue-croppie
            ref="croppieRef"
            :enableOrientation="true"
            :boundary="{ width: 300, height: 300}"
            @result="result"
            @update="update">
        </vue-croppie>

        <!-- the result -->
        <img v-bind:src="cropped">

        <button @click="bind()">Bind</button>
        <!-- Rotate angle is Number -->
        <button @click="rotate(-90)" type="button">Rotate Left</button>
        <button @click="rotate(90)" type="button">Rotate Right</button>
        <button @click="crop()" type="button">Crop Via Callback</button>
        <button @click="cropViaEvent()" type="button">Crop Via Event</button>
    </div>
</template>

<script>
    import Vue from 'vue';
    import VueCroppie from 'vue-croppie';
    import 'croppie/croppie.css' // import the croppie css manually
    Vue.use(VueCroppie);

    export default {
        name: "Avatar.vue",
        mounted() {
            // Upon mounting of the component, we accessed the .bind({...})
            // function to put an initial image on the canvas.
            this.$refs.croppieRef.bind({
                url: 'http://i.imgur.com/Fq2DMeH.jpg',
            })
        },
        data() {
            return {
                cropped: null,
                image: null
            }
        },
        methods: {
            bind() {
                // Randomize cat photos, nothing special here.
                let url = this.images[Math.floor(Math.random() * 4)]

                // Just like what we did with .bind({...}) on
                // the mounted() function above.
                this.$refs.croppieRef.bind({
                    url: url,
                });
            },
            // CALBACK USAGE
            crop() {
                let options = {
                    format: 'jpeg',
                    circle: true
                }
                this.$refs.croppieRef.result(options, (output) => {
                    this.cropped = output;
                });
            },
            // EVENT USAGE
            cropViaEvent() {
                this.$refs.croppieRef.result(options);
            },
            result(output) {
                this.cropped = output;
            },
            update(val) {
                console.log(val);
            },
            rotate(rotationAngle) {
                // Rotates the image
                this.$refs.croppieRef.rotate(rotationAngle);
            }
        }
    }
</script>

<style scoped>

</style>
