<template>
    <div>
        <div class="row justify-content-center mt-4" v-cloak v-if="count">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h2>
                                {{ title }}
                            </h2>
                        </div>
                        <hr />

                        <Answer
                            v-for="(answer, index) in answers"
                            :answer="answer"
                            :key="answer.id"
                            @deleted="remove(index)"
                        >
                            <template #author>
                                <UserInfo
                                    :model="answer"
                                    label="Answered"
                                ></UserInfo>
                            </template>
                        </Answer>

                        <div class="text-center mt-3" v-if="nextUrl">
                            <button
                                @click="fetch(nextUrl)"
                                class="border-0 bg-transparent text-primary"
                            >
                                Show more...
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <NewAnswer @created="add" :question-id="question.id" />
    </div>
</template>

<script setup>
import Answer from './Answer.vue'
import UserInfo from './UserInfo.vue'
import NewAnswer from './NewAnswer.vue'
import { computed, onMounted, ref, toRefs } from 'vue'

const props = defineProps(['question'])

const { question } = toRefs(props)

const questionId = ref(question.value.id)
const count = ref(question.value.answers_count)
const answers = ref([])
const nextUrl = ref(null)

onMounted(() => {
    fetch(`${questionId.value}/answer`)
})

const fetch = (endpoint) => {
    axios.get(endpoint).then(({ data }) => {
        answers.value.push(...data.data)
        nextUrl.value = data.next_page_url
    })
}

const title = computed(
    () => count.value + ' ' + (count.value > 1 ? 'Answers' : 'Answer')
)

const remove = (index) => {
    answers.value.splice(index, 1)
    count.value--
}

const add = (answer) => {
    answers.value.push(answer)
    count.value++
}
</script>
