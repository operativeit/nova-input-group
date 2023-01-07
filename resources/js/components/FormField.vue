<template>
  <DefaultField
    :field="field"
    :errors="errors"
    :show-help-text="showHelpText"
    :full-width-content="fullWidthContent"
  >
    <template #field>
        <div class="flex flex-wrap items-stretch w-full mb-4 relative">
            <div class="flex -mr-px w-auto" v-if="hasContentBefore">
                <span 
                  class="w-full flex px-3 bg-40 form-input-bordered rounded-l items-center border-r-0"
                  :class="prependExtraClasses"
                >
                  <display-as :iconPosition="field.prependIconPosition" :icon="field.prependIcon" :value="field.prepend" :html="field.asHtml" />
                 </span> 
            </div>
            <input
                :id="field.name"
                type="text"
                :class="classObject"
                :placeholder="currentField.placeholder || field.name"
                v-model="value"
            />
            <div class="flex -mr-px w-auto" v-if="hasContentAfter">
                <span 
                  class="w-full flex px-3 bg-40 form-input-bordered rounded-r items-center border-l-0"
                  :class="appendExtraClasses"
                >
                  <display-as :iconPosition="field.appendIconPosition" :icon="field.appendIcon" :value="field.append" :html="field.asHtml" />
               </span> 
            </div>
            
        </div>
    </template>
  </DefaultField>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'
import DisplayAs from './DisplayAs.vue'

export default {
  mixins: [FormField, HandlesValidationErrors],
  components: {
    DisplayAs,
  },
  props: ['resourceName', 'resourceId', 'field'],
  computed: {
    prependExtraClasses() {
        let extraClasses = this.field.prependExtraClasses || 'bg-gray-100';
        return extraClasses;
    },
    appendExtraClasses() {
      let extraClasses = this.field.appendExtraClasses || 'bg-gray-100';
        return extraClasses;
    },
    hasContentBefore() {
      return this.field.prependIcon || this.field.prepend
    },
    hasContentAfter() {
      return this.field.appendIcon || this.field.append
    },
    classObject() {
      let inputClass = 'form-control form-input form-input-bordered';

      if (this.hasContentBefore && this.hasContentAfter) {
          inputClass+= ' rounded-none';
          return inputClass;
      }

      if (this.hasContentBefore) {
          inputClass+=' w-3/5 rounded-l-none'
      }
      if (this.hasContentAfter) {
          inputClass+=' w-3/5 rounded-r-none'
      }

      return inputClass;
    },
  },
  methods: {
    /*
     * Set the initial, internal value for the field.
     */
    setInitialValue() {
      this.value = this.field.value || ''
    },

    /**
     * Fill the given FormData object with the field's internal value.
     */
    fill(formData) {
      formData.append(this.field.attribute, this.value || '')
    },
  },
}
</script>
