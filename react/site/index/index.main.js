/**
 * Defy Ma
 * defyma.com
 */
/*jshint esversion: 6 */
/*jshint ignore:start*/

import React, {Component} from 'react';
import ReactDOM from 'react-dom';

import App from '../../components/App'

class Main extends Component {

    render() {
        return (
            <div>

                Hello From yii2-react
                <br />
                Edit This file on 'react/site/index/index.main.js'	

            </div>
        );
    }
}

ReactDOM.render(<App><Main /></App>, document.querySelector("#root-react"));
