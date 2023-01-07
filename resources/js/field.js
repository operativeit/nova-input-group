import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-input-group', IndexField)
  app.component('detail-input-group', DetailField)
  app.component('form-input-group', FormField)
})
