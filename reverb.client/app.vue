<template>
  <div>
    <NuxtRouteAnnouncer />
    <NuxtWelcome />
  </div>
</template>

<script setup lang="ts">
const echo = useEcho()

function subscribeToPublicChannel() {
  const name = 'public-updates'
  const event = '.public.notification'

  echo
      .channel(name)
      .listen(event, (e: object) => writeNewMessage(e))
      .error((e: object) => {
        console.error('Public channel error', e)
      })
}

function writeNewMessage(event){
  console.log(event);
}

onMounted(() => {
  subscribeToPublicChannel();
})

</script>
