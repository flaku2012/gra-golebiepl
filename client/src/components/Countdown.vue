<template>
  <div>
        <div>{{ days }}d {{ hours }}h {{ minutes }}m {{ seconds }}s</div>
  </div>
</template>

<script>
import {reactive, onMounted, onBeforeUnmount, toRefs, watch } from "vue";
export default {
  name: "Countdown",
  props: {
    timestamp: {
      type: Number,
      default: Date.now(),
    },
  },
  // zmiana !!!!!!!!!!!!!!!!!!!!!!!
  setup(props, {emit}) {
    const date = reactive({
      days: 0,
      hours: 0,
      minutes: 0,
      seconds: 0,
    });
    const timer = setInterval(() => calculateDate(), 1000);

    onMounted(() => {
      calculateDate();
    });

    onBeforeUnmount(() => {
      clearInterval(timer);
    });

    watch(
      () => props.timestamp,
      () => {
        calculateDate();
      }
    );

    function calculateDate() {
      const endDate = new Date(props.timestamp * 1000);
      const currentDate = Date.now();

      const diff = endDate - currentDate;

      date.days = Math.floor(diff / (1000 * 60 * 60 * 24));
      date.hours = Math.floor(
        (diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
      );
      date.minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
      date.seconds = Math.floor((diff % (1000 * 60)) / 1000);

      date.days = date.days < 10 ? "0" + date.days : date.days;
      date.hours = date.hours < 10 ? "0" + date.hours : date.hours;
      date.minutes = date.minutes < 10 ? "0" + date.minutes : date.minutes;
      date.seconds = date.seconds < 10 ? "0" + date.seconds : date.seconds;

      if (diff <= 0) {
          clearInterval(timer);
          emit('endTimeWork') 
          date.seconds = '00';
          date.minutes = '00';
          date.hours = '00';
          date.days = '00';
        }
    }

    return { ...toRefs(date) };

    

  },
};
</script>