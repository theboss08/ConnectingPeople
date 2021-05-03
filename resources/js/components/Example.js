import React from 'react';
import ReactDOM from 'react-dom';

class Example extends React.Component {

    componentDidMount(){
        console.log('hello from react component');
    }

    render(){
        return (
            <h1>Hello from react components</h1>
        );
    }
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
