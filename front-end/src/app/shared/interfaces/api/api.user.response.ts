import { User } from"../models/User";
export interface ApiUserResponse {
  "hydra:totalItems": number;
  "hydra:member": User[]
}
