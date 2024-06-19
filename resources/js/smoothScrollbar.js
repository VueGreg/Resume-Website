import SmoothScrollbar from 'smooth-scrollbar';

const options = {
    damping: 0.06,
};

const scrollbar = SmoothScrollbar.init(document.querySelector('#scrollId'), options);

export default scrollbar;