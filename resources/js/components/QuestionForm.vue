<template>
	<form @submit.prevent="handleSubmit">
		<div class="form-group">
			<label for="question-title">Question Title</label>
			<input id="question-title" v-model="title" :class="errorClass('title')" type="text" name="title">

				<div v-if="errors['title'][0]" class="invalid-feedback">
					<strong>{{ errors['title'][0] }}</strong>
				</div>
		</div>
		<div class="form-group">
			<label for="question-body">Explain your questio</label>
			<m-editor :body="body" name="question-body">
				<textarea id="question-body" v-model="body" :class="errorClass('body')" name="body" rows="3"></textarea>
				<div v-if="errors['body'][0]" class="invalid-feedback">
					<strong>{{ errors['body'][0] }}</strong>
				</div>
			</m-editor>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-outline-primary btn-lg">{{buttonText}}</button>
		</div>
	</form>
</template>

<script>
// class="" action="{{route('questions.store')}}" method="POST"
// value="{{old('title', $question->title)}}"
// form-control {{$errors->has('title') ? 'is-invalid' : ''}}

import EventBus from '../event-bus'
import MEditor from './MEditor.vue'

export default {
	props: {
		isEdit: {
			type: Boolean,
			default: false
		}
	},
	
	components: { MEditor },

	data () {
		return {
			title: '',
			body: '',
			errors: {
				title: [],
				body: [] 
			}
		}
	},

	methods:{
		fetchQuestion () {
            axios.get(`/questions/${this.$route.params.id}`)
                 .then(({ data }) => {
                     this.title = data.title
                     this.body = data.body
                 })
                 .catch(error => {
                     console.log(error.response);
                 })
        },
		
		handleSubmit () {
			this.$emit('submitted', {
				title: this.title,
				body: this.body
			})
		},

		errorClass (column) {
			return [
				'form-control',
				this.errors[column] && this.errors[column][0] ? 'is-invalid' : ''
			]
		}
	},

	mounted () {
		EventBus.$on('error', errors => this.errors = errors)

		if (this.isEdit) {
			this.fetchQuestion();
		}
	},


	computed: {
		buttonText () {
			return this.isEdit ? 'Update Question' : 'Ask Question'
		}
	}
}
</script>