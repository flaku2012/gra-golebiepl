<template>
  <div>
      <h1>TEST EMIT</h1>
    <UserComponent
      :label="label"
      :user="user"
      blablabla="testing"
      @submit="onSubmit"
    >
      <div>init slot</div>
    </UserComponent>
    <button @click="changeName">Changer</button>
  </div>
</template>

<script>
import UserComponent from "@/components/UserComponent.vue";
import { reactive, ref } from "@vue/reactivity";
export default {
  components: {
    UserComponent,
  },

  setup() {
    const label = ref("biodata");
    const user = reactive({
      name: "nusendra",
      age: 25,
    });

    const changeName = () => {
      user.name = "Admin si ";
    };

    const onSubmit = (val) => {
      console.log(val);
    };

    return {
      label,
      user,
      changeName,
      onSubmit,
    };
  },
};
</script>

<style>
</style>