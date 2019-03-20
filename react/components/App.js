/*jshint esversion: 6 */
/* jshint ignore:start */

import React, { Component } from 'react';

import Header from './Header'

class App extends Component {

    render() {
        return (
            <div>
                <Header/>

                {/*Content Will Load Here*/}
                {this.props.children}

            </div>
        );
    }
}

export default App
