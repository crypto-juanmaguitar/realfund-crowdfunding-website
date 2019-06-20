/* eslint-disable */
import web3 from './web3';
import {abi} from 'realfund-smart-contracts/build/contracts/Crowdfunding.json'

const addressesDeploy = ['0x0C4D1F0a863DffA9b3F379df6fce4aB07685aFD9', '0xA51eec858367065b1C3B41839362050E5f409540', '0x2c20b238eBf33b09E55541f1D22421a8824c33aa']
const [,address] = addressesDeploy

const instance = new web3.eth.Contract(abi, address);

export default instance;
