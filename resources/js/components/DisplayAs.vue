<template>
  <component
    :is="`heroicons-outline-${icon}`"
    height="22"
    width="22"
    class="mx-1"
    v-if="icon"/>
</template>
<script>
import { defineComponent, getCurrentInstance, onMounted } from 'vue';
import DOMPurify from 'dompurify';

export default defineComponent({
  name: 'DisplayAs',
  props: {
    value: {
      type: String,
      required: false,
      default: '',
    },
    icon: {
      type: String,
      required: false,
      default: null,
    },
    html: {
      type: Boolean,
      required: false,
      default: false
    },
    iconPosition: {
      type: String,
      required: false,
      default: 'before',
      validator: propValue => ['before','after'].includes(propValue) 
    }
  },
  setup(props) {

    onMounted(async () => {
      let instance = getCurrentInstance()
      let el = instance.subTree.el
      let frag
      
      if (props.html) {
        let safe = DOMPurify.sanitize(props.value);
        frag = document.createRange().createContextualFragment(safe)
      } else {
        frag = document.createTextNode(props.value);
      }

      if (props.iconPosition === 'before') {
        el.parentNode.insertBefore(frag, el.nextSibling)
      } else {
        el.parentNode.insertBefore(frag, el)
      }
    })

  }
})
</script>