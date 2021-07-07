<template>
 <div class="container">
    <question :question="question" v-if="question.id"></question>
    <answers :question="question"></answers>
 </div>
</template>

<script>
import Question from '../components/Question.vue';
import Answers from '../components/Answers.vue';

export default {
 components: { Question, Answers },
 
 props: ['slug'],

 data () {
    return {
       question: {}
    }
 },

 mounted () {
    this.fetchQuestion ();
   //  alert(this.question)
   //  console.log(this.question)
 },

 methods: {
    fetchQuestion () {
       axios.get(`/questions/${this.slug}`)
       .then(({data})=> {
          this.question = data.data
       })
       .catch(error => console.log(error))
    }
 }
}
</script>