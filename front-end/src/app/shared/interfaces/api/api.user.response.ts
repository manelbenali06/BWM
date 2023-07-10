import { User } from "../models";
export interface ApiUserResponse {
  "hydra:totalItems": number;
  "hydra:member": User[]
}
