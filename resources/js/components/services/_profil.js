import { ref } from 'vue';

export default function useProfil() {
    const index = ref(0);
    const displayedText = ref('');
    const writing = ref(true);
    const textIndex = ref(0);

    let intervalId;

    const updateText = (action, texts) => {
        if (action === 'write') {
            writing.value = true;
        } else if (action === 'delete') {
            writing.value = false;
        }

        intervalId = setInterval(() => {
            const content = texts[textIndex.value];
            
            if (writing.value) {
                displayedText.value = content.slice(0, index.value);
                index.value++;

                if (index.value > content.length) {
                    clearInterval(intervalId);
                    setTimeout(() => {
                        textIndex.value = (textIndex.value + 1) % texts.length;
                        updateText('delete', texts);
                    }, 3000);
                }
            } else {
                displayedText.value = displayedText.value.substring(0, index.value);
                index.value--;

                if (index.value < 0) {
                    clearInterval(intervalId);
                    setTimeout(() => {
                        index.value = 0;
                        updateText('write', texts);
                    }, 1000);
                }
            }
        }, 100);
    };

    return {
        updateText,
        displayedText,
    }
}