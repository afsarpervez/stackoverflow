<template>
	<div class="row mt-3">
		<div class="col-md-12">            
			<div class="card"> 
				<div class="card-body">
					<div class="card-title">
						<h3>You Answer</h3>
					</div>
					<form @submit.prevent="create">
						<div class="form-group">
							<textarea id="body" class="form-control" required v-model="body" name="body" rows="7"></textarea>
						</div>
						<button type="submit" :disabled="isInvalid" class="btn btn-lg btn-outline-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	props: ['questionId'],
	data () {
		return {
			body: ''
		}
	},

	methods: {
		create () {
			axios.post(`/questions/${this.questionId}/answers`, {
				body: this.body
			})
			.catch(error => {
				this.$toast.error(error.response.data.message, "Error");
			})
			.then(({data}) => {
				this.$toast.success(data.message, "Success");
				this.body = '';
				this.$emit('created', data.answer);
			})
		}
	},
	computed: {
		isInvalid () {
			return !this.signedIn || this.body.length <10;
		}
	}
}
</script>