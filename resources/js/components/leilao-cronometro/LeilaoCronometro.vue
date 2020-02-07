<template>
    <div>
        <flip-countdown deadline="2020-12-25 00:00:00" :labels="this.labels"></flip-countdown>
    </div>
</template>

<script>
    import FlipCountdown from 'vue2-flip-countdown';

    export default {
        name: "LeilaoCronometro",
        components: { FlipCountdown },
        data() {
            return {
                labels: {
                    days: "Dias",
                    hours: "Horas",
                    minutes: "Minutos",
                    seconds: "Segundos"
                }
            }
        }
    }
</script>

<style>

    .flip-clock {
        width: 100% !important;
    }
    .flip-card {
        font-size: 2.2rem !important;
    }
    .flip-clock__slot {
        font-size: 1rem !important;
    }

</style>
